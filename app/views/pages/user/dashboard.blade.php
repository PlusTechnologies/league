@extends('layouts.dashboard.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 app-header">
    </div>  
    <div class="col-sm-12 app-frame">
      <div class="row ">
        <div class="col-sm-12">
          <h2 class="text-center home-title">Welcome to your Dashboard Hub</h2>
          <p class="text-center"><small >Take your first by exploring all the option in our system.</small> </p>
        </div>
      </div>
      <hr>

      <div class="row">

        <div class="col-md-10 col-md-offset-1">
        <!-- Boxes de Acoes -->
          <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">             
              <div class="icon">
                <div class="image"><i class="fa fa-sitemap"></i></div>
                <div class="info panel panel-default">
                  <h3 class="title">Organizations</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                  </p>

                  <div class="more">
                    <a href="dashboard/organization" title="Title Link" class="btn">
                      View All <i class="fa fa-angle-double-right"></i>
                    </a>
                  </div>
                </div>
                
              </div>
              <div class="space"></div>
            </div> 
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">             
              <div class="icon">
                <div class="image"><i class="fa fa-users"></i></div>
                <div class="info panel panel-default">
                  <h3 class="title">Teams</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                  </p>
                  <div class="more">
                    <a href="dashbard/organization" title="Title Link" class="btn">
                        View All <i class="fa fa-angle-double-right"></i>
                    </a>
                  </div>
                </div>
                
              </div>
              <div class="space"></div>
            </div> 
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">             
              <div class="icon">
                <div class="image"><i class="fa fa-child"></i></div>
                <div class="info panel panel-default">
                  <h3 class="title">Family</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                  </p>
                  <div class="more">
                    <a href="#" title="Title Link" class="btn">
                      View All <i class="fa fa-angle-double-right"></i>
                    </a>
                  </div>
                </div>
                
              </div>
              <div class="space"></div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  @stop