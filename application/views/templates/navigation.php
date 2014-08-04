<?php

echo '
        <div class="navbar navbar-inverse">
            <div class ="container">
                
                
                <a href="#" class ="navbar-brand">
                        <div class="customimage ">
                            <i class="icon-terminal icon-large customtitle"></i>
                        </div>
                </i></a>
            <a href="#" class ="navbar-brand">
                <div class="customtitle">Computer bytes</div>
                
            </a>
                
                
                <button class ="navbar-toggle" data-toggle ="collapse" data-target=".navHeaderCollapse">
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                    <span class = "icon-bar"></span>
                </button>
                
                <div class ="collapse navbar-collapse navHeaderCollapse">
                    <a class = "navbar-btn btn-primary btn navbar-right custombutton">Go</a>
                    <ul class ="nav navbar-nav navbar-right">
                    
                        '.$about.'
                        '.$FAQ.'
                        '.$contact.'
                        '.$login.'
                        <li class="customli"><input type="text" class="search-query" placeholder="Product search"></li>
                        <li></li>
                    
                    </ul>
                    
                </div>
            
            </div>
            
        </div>
        <!-- End nav -->';

?>