<!-- Modal -->
<div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body container pb20">
                  <div class="row">
                      <div class="col-lg-12">
                        <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registro</a>
                              </li>
                        </ul>
                      </div>
                  </div>
                <div class="tab-content container" id="myTabContent">
                      <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="col-lg-6 col-xl-6">
                              <div class="login_thumb">
                                  <img class="img-fluid w100" src="{{ asset('assets/portal/images/resource/login.jpg') }}" alt="login.jpg">
                              </div>
                          </div>
                          <div class="col-lg-6 col-xl-6">
                            <div class="login_form">
                                <form action="#">
                                    <div class="heading">
                                        <h4>Login</h4>
                                    </div>
                                    <div class="row mt25">
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i> Login com Facebook</button>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> Login com Google</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="E-mail">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="flaticon-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="input-group form-group">
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="flaticon-password"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                        <label class="custom-control-label" for="exampleCheck1">Lembrar</label>
                                        <!--<a class="btn-fpswd float-right" href="#">Esqueceu sua senha?</a>-->
                                    </div>
                                    <button type="button" class="btn btn-log btn-block btn-thm">Entrar</button>
                                    <p class="text-center">Não possui conta? <a class="text-thm" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Registre-se</a></p>
                                </form>
                            </div>
                          </div>
                      </div>
                      <div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="col-lg-6 col-xl-6">
                              <div class="regstr_thumb">
                                  <img class="img-fluid w100" src="{{ asset('assets/portal/images/resource/regstr.jpg') }}" alt="regstr.jpg">
                              </div>
                          </div>
                          <div class="col-lg-6 col-xl-6">
                            <div class="sign_up_form">
                                <div class="heading">
                                    <h4>Registro</h4>
                                </div>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-block btn-fb"><i class="fa fa-facebook float-left mt5"></i> Registrar com Facebook</button>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-block btn-googl"><i class="fa fa-google float-left mt5"></i> Registrar com Google</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group input-group">
                                        <input type="text" class="form-control" id="exampleInputName" placeholder="Nome completo">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="flaticon-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Senha">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="flaticon-password"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group input-group">
                                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Repita a senha">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="flaticon-password"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="exampleCheck2">
                                        <label class="custom-control-label" for="exampleCheck2">Eu li e aceito os Termos e Política de Privacidade</label>
                                    </div>
                                    <button type="button" class="btn btn-log btn-block btn-thm">Cadastrar</button>
                                    <p class="text-center">Já possui uma conta? <a class="text-thm" data-toggle="tab" href="#home" role="tab" aria-controls="home">Login</a></p>
                                </form>
                            </div>
                          </div>
                      </div>
                </div>
              </div>
        </div>
    </div>
</div>
