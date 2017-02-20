
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3><strong>Iniciar Sesion</strong></h3>
                    </div>
                    <div class="modal-body">
                        <div id="alert-login" align="center"></div>
                        <form class="form-horizontal" method="POST" onsubmit="return login_user(this)" role="form">
                            <div class="form-group">
                              <label class="col-lg-4 control-label">E-mail</label>
                              <div class="col-lg-8">
                                  <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Contraseña</label>
                              <div class="col-lg-8">
                                  <input name="password" type="password" class="form-control"  placeholder="Contraseña" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-offset-4 col-lg-4">
                                  <button type="submit" class="btn btn-login">Entrar</button>
                              </div>
                               <div class="col-lg-4">
                                   <button id="login-facebook" type="button" class="btn btn-primary">Entrar con Facebook</button>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-offset-4 col-lg-8">
                                  <a href="registro"><strong>Registrarse</strong></a>
                              </div>
                              <div class="col-lg-offset-4 col-lg-8">
                                  <a href="reset">¿Olvidaste tu contraseña?</a>
                              </div>
                              <!--<div class="col-lg-offset-4 col-lg-4">
                                  <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
                              </div>-->
                                
                            </div>
                          </form>
                    </div>
               </div>
            </div>
         </div>