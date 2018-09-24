<nav class="navbar navbar-main navbar-default" id="navbar-main-navbar-default" role="navigation" style="opacity: 1;">
    <div class="container">
        <!-- Brand and toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links,  -->
        <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
            <ul class="nav navbar-nav">
                @foreach($categoriesButtonsName as $categoryButton)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false" title="{{ $categoryButton->name }}">{{ $categoryButton->name }}<i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        @foreach($subCategoriesButtonsName as $subCategoryButton)
                            @if ($subCategoryButton->category_id == $categoryButton->id)
                                <li><a href="/store/search?sub_category={{ $subCategoryButton->identifier }}" title="{{ $subCategoryButton->name }}">{{ $subCategoryButton->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                @endforeach






                <script>
                    //$(document).ready(function(){
                      //  $('#store-button').click(function(){
                        //    window.location.href ='/store'
                       // });
                    //});
                </script>
                @foreach($pagesButtonsRender as $pageButton)
                    <li><a href="/page?show={{ $pageButton->url_page }}" class="dropdown-toggle"  data-hover="dropdown" data-close-others="false" title="{{ $pageButton->name_page }}">{{ $pageButton->name_page }}</a></li>
                @endforeach




            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>
                <li>

                </li>

                <li class="dropdown">

                </li>

                <li class="dropdown" id="menu-scroll-cart">

                </li>

            </ul>



        </div><!-- /.navbar-collapse -->
    </div>
</nav>