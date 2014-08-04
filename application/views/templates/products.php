<?php
echo'
                   <div class="container">
    <div class="row-lg-2">
        <div class="col-lg-3">
        <div class="panel panel-default custompanelactive">
            <div class="panel-body">
                Products<span class="customright customtitle"> <i class="icon-chevron-right icon-medium"></i></span>
            </div>
        </div>
        
        <!-- Begin product selection section -->
        <br>
        <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Computers</b></h3>
  </div>
  <div class="panel-body">
     <b>Brand</b>
      <br>';
      
      foreach($products as $value)
      {
          echo $value;
      }
      
      echo '
      
      
      <!--
     <b>Price</b>
      <p class="customIndent">&#163;1 to &#163;200(5)</p>
      <p class="customIndent">&#163;201 to &#163;400(8)</p>
      <p class="customIndent">&#163;400 and up(9)</p>
      -->
      <b>CPU</b>
      '; foreach($processor as $value)
      {
          echo $value;
      }

      echo '<!--
      <b>RAM</b>
        <p class="customIndent">4GB(9)</p>
      <p class="customIndent">8GB(6)</p>
      -->
  </div>
</div>
            
        
    </div>
        
        
        <div class="col-lg-6">
        <div class="panel panel-default custompanelactive">
            <div class="panel-body">
                Computers<span class="customright customtitle"> <i class="icon-chevron-right icon-medium"></i></span>
            </div>
        </div>
            <div class= row-lg-3>
                <br>

                <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title pull-left">Results</h3>
    <ul class="pagination pagination-panel pull-right">
      <li><a href="#">«</a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">»</a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    
    <!-- Product -->
            ';
     
     foreach($productsList as $value)
     {
         echo $value;
         
     }
        
     echo'
    <!-- End Product -->
  </div>
  <div class="panel-footer">
    
    <ul class="pagination pagination-panel pull-right">
      <li><a href="#">«</a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">»</a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
</div>
            
            
        </div>
        </div>  ';

?>