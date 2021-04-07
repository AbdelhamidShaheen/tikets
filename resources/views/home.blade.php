@extends("layouts.home_tem")
@section('content')
<nav class="mnb navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <i class="ic fa fa-bars"></i>
        </button>
        <div style="padding: 15px 0;">
           <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
        </div>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right" >
          
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">languages <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">EN</a></li>
              <li><a href="#">AR</a></li>
             
            </ul>
          </li>
          <li v-if="!auth">
            <router-link  to="/login" class="nav-link"><i class="fas fa-sign-in-alt " style="margin-right: 2px"></i>login</router-link>
          </li>
          <li v-if="!auth">
             
              <router-link to="/register" class="nav-link"><i class="fas fa-user-plus" style="margin-right: 2px"></i>register</router-link>

          </li>
        </ul>
  
      </div>
    </div>
  </nav>
  <!--msb: main sidebar-->
  <div class="msb" id="msb" >
          <nav class="navbar navbar-default" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <div class="brand-wrapper">
                      <!-- Brand -->
                      <div class="brand-name-wrapper">
                      
                          <router-link to="/" class="nav-link navbar-brand">Booking</router-link>

                      </div>
  
                  </div>
  
              </div>
  
              <!-- Main Menu -->
              <div class="side-menu-container">
                  <ul class="nav navbar-nav">
  
                    
                    <li v-if="role==='user'"><router-link to="/showtikets">Tikets</router-link></li>

  
                      <!-- Dropdown-->
                      <li class="panel panel-default" id="dropdown" v-if="role==='admin'">
                          <a data-toggle="collapse" href="#dropdown-lvl1">
                              <i class="fa fa-dashboard"></i> Dashboard
                            <span class="caret"></span>
                          </a>
                          <!-- Dropdown level 1 -->
                          <div id="dropdown-lvl1" class="panel-collapse collapse">
                              <div class="panel-body">
                                  <ul class="nav navbar-nav">
                                      <li> <router-link to="/dashboard" class="nav-link"><i ></i>Home</router-link>
                                      </li>
                                      <li> <router-link to="/dashboard/users">Users</router-link>
                                      </li>
         






                                      <li class="panel panel-default">
                                        <a data-toggle="collapse" href="#dropdown-lvl2">
                                            Tikets
                                          <span class="caret"></span>
                                        </a>
                                        <!-- Dropdown level 1 -->
                                        <div id="dropdown-lvl2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul class="nav navbar-nav">
                                                   
                                                    <li><router-link to="/dashboard/tikets">Show Tikets</router-link></li>
                                                    <li><router-link :to="{ name: 'AddTiket'}" >Add Tiket</router-link></li>
              
                
                                                    
                                                </ul>
                                            </div>
                                        </div>
              
                                    </li>








  
                                      
                                  </ul>
                              </div>
                          </div>

                      </li>
                      <li><router-link to="/logout" v-if="auth"><i class="fas fa-sign-out-alt"></i>LogOut</router-link></li>

                  </ul>
              </div><!-- /.navbar-collapse -->
          </nav>  
  </div>
  <!--main content wrapper-->
  <div class="mcw">
    <!--navigation here-->
    <!--main content view-->
    <div class="container">
        <router-view v-on:updateparent="handleUpdate" ></router-view>

    </div>

  </div>















  


   

@endsection
