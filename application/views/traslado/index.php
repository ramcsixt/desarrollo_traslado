<div class="container" style="font-size: 12px; text-align: -webkit-center; font-weight: bold;">
            <div class="panel-heading">
                <form class="form" name="form_viaje">
                    <div class="row" style="padding-top: 5px;">
                        <div col-4>
                            <img src="<?php echo base_url("Public/img/logo/remesse_logo.png")?>" alt="REMESSE" style="width: 120px; height: 38px; padding-left: 13px;">
                            <input type="hidden" id="url" name="url" value="<?php echo base_url();?>">
                        </div>
                        
                        <div class="col-8">
                            <label style="padding-top: 17px;">Servicio de Traslado </label>                  
                        </div>
                  </div>
                    <hr>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-3">
                        <div class="title">
                            <span class="number" >
                                <button id="circle1" type="button" class="btn btn-circle" style="background-color: rgb(255, 95, 0); color:white">
                                    <i class="fa" aria-hidden="true" id="cheked1">1</i>
                                </button>
                            </span>
                          
                        </div>
                        
                        </div>
                        <div class="col-3">
                            <span class="number" >
                                <button id="circle2" type="button" class="btn btn-warning btn-circle" style="background-color: #969696; color:white">
                                    <i class="fa" aria-hidden="true" id="cheked2">2</i>
                                </button>
                            </span>
                        </div>
                        <div class="col-3">
                            <button id="circle3" type="button" class="btn btn-warning btn-circle"  style="background-color: #969696; color:white">
                                <i class="fa" aria-hidden="true" id="cheked3">3</i>
                            </button>
                        </div>
                        <div class="col-3">
                        <button id="circle4" type="button" class="btn btn-warning btn-circle"  style="background-color: #969696; color:white">
                            <i class="fa" aria-hidden="true" id="cheked4">4</i>
                        </button>
                        </div>
                        <hr>
                    </div>
                    <div class="row" id="paso1">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="container-fluid" style="margin-top: 18px; color:rgb(255, 95, 0); font-size: 14px;">
                                       <div class="form-row" style="text-align: justify;">
                                            <div class="col-12" style=" margin-bottom: 20px;">
                                                <span class="title_text">¿A QUIÉN LLEVAMOS?</span>
                                            </div>
                                        </div>
                                        <div class="form-row" style="text-align: justify;">
                                            <div class="col-md-4 mb-3">
                                                <label for="validarNombre" style="font-size: 12px !important;">Nombre y Apellido (*)</label>
                                                <input type="text" class="form-control" id="full_nombre" name="full_nombre" placeholder="Ingrese Nombre y Apellido" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validarCorreo" style="font-size: 12px !important;">Correo Electrónico (*)</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" id="correo" name="correo" required placeholder="Ingrese Correo Electrónico" aria-describedby="validationTooltipUsernamePrepend" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationTooltip02" style="font-size: 12px !important;">Teléfono (*)</label>
                                                <input type="number" class="form-control" id="tel_movil" name="tel_movil" placeholder="Ingrese Número del Teléfono movil" required>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" id="paso2" style="display:none">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="container-fluid" style="margin-top: 18px; color:rgb(255, 95, 0); font-size: 14px;">
                                       <div class="form-row" style="text-align: justify;">
                                            <div class="col-12" style=" margin-bottom: 20px;">
                                                <span class="title_text">¿Dónde te recojemos?</span>
                                            </div>
                                        </div>
                                        <div class="form-row" style="text-align: justify;">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" id="ubicacion_ida" name="ubicacion_ida" placeholder="Origen" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="ubicacion_vuelta" name="ubicacion_vuelta" required placeholder="Destino" aria-describedby="validationTooltipUsernamePrepend" required>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-12" style="padding-top: 10px;">
                                                <div id="map" style="height: 500px;	width: 100%;padding-top: 20px;">
                                                   <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31206.907600214043!2d-77.0463574565432!3d-12.121494091715405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8137c30393f%3A0x5268cb2b1c4b162b!2sMiraflores!5e0!3m2!1ses-419!2spe!4v1587911066670!5m2!1ses-419!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" id="paso3" style="display:none">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="container-fluid" style="margin-top: 18px; color:rgb(255, 95, 0); font-size: 14px;">
                                       <div class="form-row" style="text-align: justify;">
                                            <div class="col-12" style=" margin-bottom: 20px;">
                                                <span class="title_text">Programar Viaje</span>
                                            </div>
                                        </div>
                                        <div class="form-row" style="text-align:  justify;">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="padding-top: 16px;">
                                                        <input type="text" onfocus="(this.type='date')" class="form-control" id="fecha_ida" name="fecha_ida" required placeholder="Ingrese fecha de recojo">
                                                        
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="padding-top: 16px;">
                                                        <input type="text" onfocus="(this.type='time')" class="form-control" id="hora_ida" name="hora_ida" required placeholder="Ingrese hora de Recojo">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2" style="padding-top: 16px;">
                                                        <input type="hidden" name="tarifa" id="tarifa">
                                                        <button type="button" id="add" value="0" class="btn btn-outline-warning btn-sm"> + AÑADIR</button>
                                                    </div>

                                                </div>
                                                <div class="row" style="padding-top: 16px;">
                                                    <div class="col-12">
                                                        <table class="table" width="100%" id="tableFechas">
                                                            <thead class="thead-dark">
                                                              <tr>
                                                                <th scope="col">Fecha Recojo</th>
                                                                <th scope="col">Hora Recojo</th>
                                                                <th scope="col">&nbsp;&nbsp;&nbsp;</th>
                                                              </tr>
                                                              <tbody id="cuerpo_tabla">
                                                              
                                                              </tbody>
                                                            </thead>
                                                            
                                                        </table>
                                                    </div>
                                                    <div col-12 style="padding-left: 17px;;">
                                                        <button type="button" class="btn btn-secondary" data-toggle="snackbar" data-style="toast" data-content="Importe del servicio" style="background-color: #ff5722; color: white;">
                                                            <i id="mostrar_precio"> Tarifa: S/. 0.00</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                          
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" id="paso4" style="display:none">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="container-fluid" style="margin-top: 18px; color:rgb(255, 95, 0); font-size: 14px;">
                                       <div class="form-row" style="text-align: justify;">
                                            <div class="col-12" style=" margin-bottom: 20px;">
                                                <span class="title_text">PAGO</span>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 10px;">
                                            <div class="col-12">
                                                <label for="validarNombre" style="font-size: 12px !important; display: -webkit-box;">¿Tiene algo que agregar a su pedido?</label>
                                                <textarea class="form-control is-invalid" id="observacion" placeholder="Ej. Necesito un auto con maleta grande..." required="" style="margin-top: 0px; margin-bottom: 0px; height: 64px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 10px;">
                                            <div class="col-12" style="display: -webkit-box;">
                                                <label for="validarNombre" style="font-size: 12px !important;">Precio <b><i id="tarifa"></i></b></label>
                                            </div>
                                            <div class="col-12" style="display: -webkit-box;">
                                                <button type="button" id="ver_detalle" class="btn btn-outline-dark"> Ver detalle </button>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 10px;">
                                            <div class="col-12">
                                                <label for="validarNombre" style="font-size: 12px !important; display: -webkit-box;">Seleccione metodo de pago.</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="radio">
                                                    <label style="display: -webkit-box; color: rgb(255, 95, 0); font-size: 12px !important;">
                                                        <input type="radio" name="metodo_pago" id="metodo_pago1" value="tarjeta" >
                                                        TARJETA DE CREDITO/DEBITO
                                                    </label>
                                                 </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="radio">
                                                    <label style="display: -webkit-box; color: rgb(255, 95, 0); font-size: 12px !important;">
                                                        <input type="radio" name="metodo_pago" id="metodo_pago2" value="efectivo">
                                                        CASH. EFECTIVO
                                                    </label>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="error_mensaje" style="text-align: justify;" style="margin-top: 9px;">
                        <div class="col-12">
                            <div id="cuerpo_mensaje" class="alert alert-warning" role="alert"background-color: #f44336c9; color: white;>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row" style="padding-top: 35px;">
                        <div class="col-6" style="text-align: initial;">
                            <label id="pagin" style="font-size: 12px; color: #927f7ff7; padding-top: 20px;">Paso 1 de 4</label>
                        </div>
                        <div class="col-6">
                           
                            <button type="button" id="rev" class="btn btn-outline-secondary" style="background-color: #6c757d; color: white; display: none;">Atras</button>
                            <button type="button" id="next" data-descripcion="Viaje de ida y retorno" data-producto="Traslado" data-precio=400 class="btn btn-outline-warning" style="background-color: #ff5722; color: white;">Siguiente</button>
                            <button type="button" id="pagoEnvio" class="btn btn-outline-warning" style="background-color: #ff5722; color: white; display: none;">Enviar</button>
                             
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="modal" id="mensaje" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="titulo_mensaje">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p id="cuerpo_mensaje">Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-secondary" id="cerrar_mensaje" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>