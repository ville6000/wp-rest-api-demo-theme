<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<body ng-app="restApiDemo">

<header class="header">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-title">
                        <a ng-href="#/">
                            WP REST API Demo Theme
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div ng-view></div>
            </div>
            <div class="col-xs-12 col-sm-3 sidebar">
                <section class="post-search" ng-controller="SearchFormController as SearchFormCtrl">
                    <form class="form" name="search" ng-submit="SearchFormCtrl.search()">
                        <div class="form-group">
                            <label for="search-term" class="sr-only">
                                Search:
                            </label>
                            <input type="text" name="search-term" id="search-term" class="form-control"
                                   ng-model="searchTerm">
                        </div>
                        <button class="btn btn-info">Search</button>
                    </form>
                </section>

                <section class="taxonomies" ng-controller="CategoryListController as categoryListCtrl">
                    <h2>Categories</h2>
                    <ul class="taxonomy-list">
                        <li ng-repeat="item in items">
                            <a ng-href="#/category/{{item.slug}}">
                                {{item.name}}
                                <span class="count">({{item.count}})</span>

                                <ul class="taxonomy-list-children" ng-if="item.children">
                                    <li ng-repeat="itemChild in item.children">
                                        <a ng-href="#/category/{{itemChild.slug}}">
                                            {{itemChild.name}}
                                            <span class="count">({{itemChild.count}})</span>
                                        </a>
                                    </li>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>
                    <a href="https://github.com/ville6000/wp-rest-api-demo-theme">
                        View source on GitHub
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>