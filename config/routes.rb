ActionController::Routing::Routes.draw do |map|
  # Load plugin routes first. A little bit ugly, but I didn't find any better way to do it
  # We consider that only typo_* plugins are concerned
  Dir.glob(File.join("vendor", "plugins", "typo_*")).each do |dir|
    if File.exists?(File.join(dir, "config", "routes.rb"))
      require File.join(dir, "config", "routes.rb")
    end
  end

  # for CK Editor
  map.connect 'fm/filemanager/:action/:id', :controller => 'Fm::Filemanager'
  map.connect 'ckeditor/command', :controller => 'ckeditor', :action => 'command'
  map.connect 'ckeditor/upload', :controller => 'ckeditor', :action => 'upload'

  # TODO: use only in archive sidebar. See how made other system
  map.articles_by_month ':year/:month', :controller => 'articles', :action => 'index', :year => /\d{4}/, :month => /\d{1,2}/
  map.articles_by_month_page ':year/:month/page/:page', :controller => 'articles', :action => 'index', :year => /\d{4}/, :month => /\d{1,2}/
  map.articles_by_year ':year', :controller => 'articles', :action => 'index', :year => /\d{4}/
  map.articles_by_year_page ':year/page/:page', :controller => 'articles', :action => 'index', :year => /\d{4}/

  map.admin 'admin', :controller  => 'admin/dashboard', :action => 'index'

  # make rss feed urls pretty and let them end in .xml
  # this improves caches_page because now apache and webrick will send out the
  # cached feeds with the correct xml mime type.

  map.rss 'articles.rss', :controller => 'articles', :action => 'index', :format => 'rss'
  map.atom 'articles.atom', :controller => 'articles', :action => 'index', :format => 'atom'

  map.with_options :controller => 'xml', :path_prefix => 'xml' do |controller|
    controller.xml 'articlerss/:id/feed.xml', :action => 'articlerss'
    controller.xml 'commentrss/feed.xml', :action => 'commentrss'
    controller.xml 'trackbackrss/feed.xml', :action => 'trackbackrss'

    controller.with_options :action => 'feed' do |action|
      action.xml 'rss', :type => 'feed', :format => 'rss'
      action.xml 'sitemap.xml', :format => 'googlesitemap', :type => 'sitemap', :path_prefix => nil
      action.xml ':format/feed.xml', :type => 'feed'
      action.xml ':format/:type/:id/feed.xml'
      action.xml ':format/:type/feed.xml'
    end
  end


  map.resources :comments, :name_prefix => 'admin_', :collection => [:preview]
  map.resources :trackbacks

  map.live_search_articles '/live_search/', :controller => "articles", :action => "live_search"
  map.search '/search/:q.:format/page/:page', :controller => "articles", :action => "search"
  map.search '/search/:q.:format', :controller => "articles", :action => "search"
  map.search_base '/search/', :controller => "articles", :action => "search"
  map.connect '/archives/', :controller => "articles", :action => "archives"
  map.connect '/setup', :controller => 'setup', :action => 'index'
  map.connect '/setup/confirm', :controller => 'setup', :action => 'confirm'

  # I thinks it's useless. More investigating
  map.connect "trackbacks/:id/:day/:month/:year",
    :controller => 'trackbacks', :action => 'create', :conditions => {:method => :post}

  # Before use inflected_resource
  map.resources :categories, :except => [:show, :update, :destroy, :edit]
  map.resources :categories, :as => 'category', :only => [:show, :edit, :update, :destroy]

  map.connect '/category/:id/page/:page', :controller => 'categories', :action => 'show'

  # Before use inflected_resource
  map.resources :tags, :except => [:show, :update, :destroy, :edit]
  map.resources :tags, :as => 'tag', :only => [:show, :edit, :update, :destroy]

  map.connect '/tag/:id/page/:page', :controller => 'tags', :action => 'show'
  map.connect '/tags/page/:page', :controller => 'tags', :action => 'index'

  map.xml '/author/:id.:format', :controller => 'authors', :action => 'show', :format => /rss|atom/
  map.connect '/author/:id', :controller => 'authors', :action => 'show'

  # allow neat perma urls
  map.connect 'page/:page',
    :controller => 'articles', :action => 'index',
    :page => /\d+/

  date_options = { :year => /\d{4}/, :month => /(?:0?[1-9]|1[012])/, :day => /(?:0[1-9]|[12]\d|3[01])/ }

  map.with_options(:conditions => {:method => :get}) do |get|
    get.connect 'pages/*name',:controller => 'articles', :action => 'view_page'

    get.with_options(:controller => 'theme', :filename => /.*/, :conditions => {:method => :get}) do |theme|
      theme.connect 'stylesheets/theme/:filename', :action => 'stylesheets'
      theme.connect 'javascripts/theme/:filename', :action => 'javascript'
      theme.connect 'images/theme/:filename',      :action => 'images'
    end

    # For the tests
    get.connect 'theme/static_view_test', :controller => 'theme', :action => 'static_view_test'
  end

  map.connect 'previews/:id', :controller => 'articles', :action => 'preview'
  map.connect 'check_password', :controller => 'articles', :action => 'check_password'

  # Work around the Bad URI bug
  %w{ accounts backend files sidebar xml }.each do |i|
    map.connect "#{i}", :controller => "#{i}", :action => 'index'
    map.connect "#{i}/:action", :controller => "#{i}"
    map.connect "#{i}/:action/:id", :controller => i, :id => nil
  end

  %w{advanced cache categories comments content profiles feedback general pages
     resources sidebar textfilters themes trackbacks users settings tags redirects }.each do |i|
    map.connect "/admin/#{i}", :controller => "admin/#{i}", :action => 'index'
    map.connect "/admin/#{i}/:action/:id", :controller => "admin/#{i}", :action => nil, :id => nil
  end

  # default
  map.root :controller  => 'articles', :action => 'index'

  map.connect '*from', :controller => 'articles', :action => 'redirect'

  map.connect(':controller/:action/:id') do |default_route|
    class << default_route
      def recognize_with_deprecation(path, environment = {})
        ::Rails.logger.info "#{path} hit the default_route buffer"
        recognize_without_deprecation(path, environment)
      end
      alias_method_chain :recognize, :deprecation

      def generate_with_deprecation(options, hash, expire_on = {})
        ::Rails.logger.info "generate(#{options.inspect}, #{hash.inspect}, #{expire_on.inspect}) reached the default route"
        #         if ::Rails.env == 'test'
        #           raise "Don't rely on default route generation"
        #         end
        generate_without_deprecation(options, hash, expire_on)
      end
      alias_method_chain :generate, :deprecation
    end
  end
end
