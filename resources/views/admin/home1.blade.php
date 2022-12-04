@extends('admin.layouts.app_inner')

@section('content')

              <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
              <div class="row state-overview">
                  <div class="col-lg-4">
                  <!--user profile info start-->
                  <section class="panel">
                      <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-4 col-sm-4 profile-widget-name">
                              <h4>Client Feedback</h4>               
                              <div class="follow-ava">
                                  <img src="img/profile-widget-avatar.jpg" alt="">
                              </div>
                              <h6></h6>
                            </div>
                            <div class="col-lg-8 col-sm-8 follow-info">
                               
                                <p>ThiruMurugan</p>
                                <h6>
                                    <span><i class="icon_clock_alt"></i>11:05 AM</span>
                                    <span><i class="icon_calendar"></i>25.10.13</span><br/><br/>
                                    <span><i class="icon_pin_alt"></i>Thirumangalam</span>
                                </h6>
                            </div>
                            <div class="weather-category twt-category">
                                      <ul>
                                          <li class="active">
                                              <h4>50</h4>
                                              <i class="icon_close_alt2"></i> Pending Task
                                          </li>
                                          <li>
                                              <h4>550</h4>
                                              <i class="icon_check_alt2"></i> Completed
                                          </li>
                                          <li>
                                              <h4>600</h4>
                                              <i class="icon_plus_alt2"></i> Total Task
                                          </li>
                                      </ul>
                                  </div>
                          </div>
                          <footer class="profile-widget-foot">
                            <div class="follow-task">
                                <span>
                                <a href="">
                                    <i class="icon_mail_alt tooltips" data-original-title="My Mail"></i>
                                    <span class="badge bg-important">4</span>
                                </a>
                                </span>
                                <span>
                                <a href="">
                                    <i class="icon_percent tooltips" data-original-title="My Profit"></i>                                                                       </a>
                                </span>
                                <span>
                                <a href="">
                                    <i class="icon_heart_alt tooltips" data-original-title="Favorits"></i>                                    
                                    <span class="badge bg-important">2</span>
                                </a>
                                </span>
                                <span>
                                <a href="">
                                    <i class="icon_cart_alt tooltips" data-original-title="Sell"></i>                                    
                                </a>
                                </span>
                                <span>
                                <a href="">
                                    <i class="icon_lightbulb_alt tooltips" data-original-title="Suggesation"></i>                                    
                                    <span class="badge bg-important">6</span>
                                </a>
                                </span>
                                <span>
                                <a href="">
                                    <i class="icon_piechart tooltips" data-original-title="Reports"></i>                                    
                                </a>
                                </span>
                                
                            </div>
                          </footer>
                      </div>
                  </section>
                  <!--user profile info end-->
                </div>
                <!-- statics start -->
                <div class="state col-lg-8">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6">
                          <section class="panel">
                              <div class="symbol">
                                  <i class="icon_globe"></i>
                              </div>
                              <div class="value">
                                  <h1>22</h1>
                                  <p>Today's Visitors</p>
                              </div>
                          </section>
                      </div>
                      <div class="col-lg-3 col-sm-6">
                          <section class="panel">
                              <div class="symbol">
                                  <i class="icon_tags_alt"></i>
                              </div>
                              <div class="value">
                                  <h1>140</h1>
                                  <p>Sales</p>
                              </div>
                          </section>
                      </div>
                      <div class="col-lg-3 col-sm-6">
                          <section class="panel">
                              <div class="symbol">
                                  <i class="icon_cart_alt"></i>
                              </div>
                              <div class="value">
                                  <h1>345</h1>
                                  <p>New Order</p>
                              </div>
                          </section>
                      </div>
                      <div class="col-lg-3 col-sm-6">
                          <section class="panel">
                              <div class="symbol">
                                  <i class="icon_currency"></i>
                              </div>
                              <div class="value">
                                  <h1>5,500</h1>
                                  <p>Total Profit</p>
                              </div>
                          </section>
                      </div>
                    </div>

                    <div class="row knob-charts">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-body">
                                      <ul class="summary-list">
                                          <li>
                                              <a href="javascript:;">
                                                  <input class="knob" data-readonly="true" data-width="80" data-height="80" data-displayPrevious=true  data-thickness=".1" value="75" data-fgColor="#007AFF" data-bgColor="#F7F7F7">
                   
                              <p><i class="icon_currency"></i> Sell</p>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:;">
                                                  <input class="knob" data-readonly="true" data-width="80" data-height="80" data-displayPrevious=true  data-thickness=".1" value="25" data-fgColor="#34AADC" data-bgColor="#F7F7F7">
                                                  <p><i class="icon_cart_alt"></i> Purchase</p>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:;">
                                                  <input class="knob" data-readonly="true" data-width="80" data-height="80" data-displayPrevious=true  data-thickness=".1" value="85" data-fgColor="#FF2D55" data-bgColor="#F7F7F7">
                                                  <p><i class="icon_easel"></i> Bounce Rate</p>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:;">
                                                  <input class="knob" data-readonly="true" data-width="80" data-height="80" data-displayPrevious=true  data-thickness=".1" value="95" data-fgColor="#34AADC" data-bgColor="#F7F7F7">
                                                  <p><i class="icon_datareport"></i> New Visits</p>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="javascript:;">
                                                  <input class="knob" data-readonly="true" data-width="80" data-height="80" data-displayPrevious=true  data-thickness=".1" value="65" data-fgColor="#007AFF" data-bgColor="#F7F7F7">
                                                  <p><i class="icon_search"></i> Search Traffic</p>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>                                
                            </div>
                        </div>                        
                    </div>
                </div>    
                <!-- statics end -->
              </div>
              <!--overview end-->

              <!-- project team & activity start -->
              <div class="row">
                  <div class="col-lg-4">
                      <!--project team start-->
                      <section class="panel">
                        <div class="panel-body project-team">
                            <div class="task-progress">
                                  <h1>Project Team</h1>  
                            </div>
                        </div>
                        <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>
                                    <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                    </span>
                                  </td>
                                  <td>
                                      <p class="profile-name">John Doe</p>
                                      <p class="profile-occupation">UX Designer</p>
                                  </td>
                                  <td>
                                      <span class="badge bg-important">75%</span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar-mini.jpg">
                                    </span>
                                  </td>
                                  <td>
                                      <p class="profile-name">Rena Rios</p>
                                      <p class="profile-occupation">UX Designer</p>
                                  </td>
                                  <td>
                                      <span class="badge bg-success">43%</span>
                                  </td>                                  
                              </tr>
                              <tr>
                                  <td>
                                    <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar-mini2.jpg">
                                    </span>
                                  </td>
                                  <td>
                                      <p class="profile-name">Robin Mathis</p>
                                      <p class="profile-occupation">UX Designer</p>
                                  </td>
                                  <td>
                                      <span class="badge bg-info">67%</span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar-mini3.jpg">
                                    </span>
                                  </td>
                                  <td>
                                      <p class="profile-name">Bennie Gilliam</p>
                                      <p class="profile-occupation">UX Designer</p>
                                  </td>
                                  <td>
                                      <span class="badge bg-warning">30%</span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar-mini4.jpg">
                                    </span>
                                  </td>
                                  <td>
                                      <p class="profile-name">Eddy Wilcox</p>
                                      <p class="profile-occupation">UX Designer</p>
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">15%</span>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--Project Team end-->
                  </div>

                  <div class="col-lg-8">
                      <!--Project Activity start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                            <div class="row">
                              <div class="col-lg-8 task-progress pull-left">
                                  <h1>Project Activity</h1>                                  
                              </div>
                              <div class="col-lg-4">
                                <span class="profile-ava pull-right">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        John Doe
                                </span>                                
                              </div>
                            </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>Today</td>
                                  <td>
                                      Project SRS.
                                  </td>
                                  <td>
                                      <span class="badge bg-important">Upload</span>
                                  </td>
                                  <td>
                                    <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                    </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Yesterday</td>
                                  <td>
                                      Project Design Task
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Task</span>
                                  </td>
                                  <td>
                                      <div id="work-progress2"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>21.10.13</td>
                                  <td>
                                      Generate Invoice
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Task</span>
                                  </td>
                                  <td>
                                      <div id="work-progress3"></div>
                                  </td>
                              </tr>                              
                              <tr>
                                  <td>22.10.13</td>
                                  <td>
                                      Project Testing
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">To-Do</span>
                                  </td>
                                  <td>
                                      <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                      </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>24.10.13</td>
                                  <td>
                                      Project Release Date
                                  </td>
                                  <td>
                                      <span class="badge bg-info">Milestone</span>
                                  </td>
                                  <td>
                                      <div id="work-progress4"></div>
                                  </td>
                              </tr>                              
                              <tr>
                                  <td>28.10.13</td>
                                  <td>
                                      Project Release Date
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">To-Do</span>
                                  </td>
                                  <td>
                                      <div id="work-progress5"></div>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--Project Activity end-->
                  </div>
              </div>
              <!-- project team & activity end -->

          </section>
      </section>
        
 
@endsection
