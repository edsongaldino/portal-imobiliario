<!-- Modal -->
<div class="modal fade" id="ModalContato" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Contato Whatsapp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalAgendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Agendar Visita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Agendar Visita</button>
            </div>
        </div>
        </div>
    </div>




	<!-- Modal -->
	<div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content modal-contato">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
		      	<div class="modal-body container pb20">

                    <div class="tab-content container" id="myTabContent" style="display: block">

                        <h3><i class="fa fa-user" aria-hidden="true"></i> Meus dados de contato</h3>

					  	<div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="" method="POST" id="ContatoWhatsapp">
                                @csrf
                                <input type="hidden" id="anuncio_id" name="anuncio_id" value="{{ $anuncio->id }}">
								<div class="row">
									<div class="col-lg-12">
										<label for="propertyDescription">Nome completo</label>
										<input type="text" name="nome" class="form-control" id="Modalnome">
									</div>
									<div class="col-lg-12">
										<label for="propertyDescription">E-mail</label>
										<input type="text" class="form-control" name="email" id="Modalemail">
									</div>
									<div class="col-lg-12">
										<label for="propertyDescription">Telefone</label>
										<input type="text" class="form-control telefone" name="telefone" id="Modaltelefone">
									</div>
									<div class="col-lg-12 aceite">
                                        <label for="receber"><input type="checkbox" id="receber" name="receber" value="Sim">Gostaria de receber o contato de anunciantes com imóveis similares</label>
									</div>

                                    <div class="box-g-recaptcha-modal">
                                        <div class="g-recaptcha" data-sitekey="6LfVO14pAAAAAPv-l4wDs1E6Xc9Pv5m1w7dQC3Mu"></div>
                                    </div>

                                    <input type="hidden" name="mensagem" value="Olá, tenho interesse neste imóvel: {{ $anuncio->tipo->nome }}, {{ $anuncio->endereco->logradouro_endereco }} - {{ $anuncio->endereco->bairro_endereco }}, {{ $anuncio->endereco->cidade->nome_cidade }} - {{ $anuncio->endereco->cidade->estado->uf_estado }}, {{ $anuncio->transacao }} - ID: {{ $anuncio->id_externo }}. Aguardo o contato. Obrigado.">
									<div class="col-lg-12">
										<button class="btn-success enviar-form-whatsapp contatoWhatsapp">Enviar</button>
									</div>
								</div>
                            </form>
					  	</div>
					</div>

                    <div class="contato-anuncio" id="ContatoAnuncio" style="display: none">
                        <div class="sl_creator">
                            <div class="media">
                                <img class="mr-3" src="{{ url('anunciante/'.$anuncio->anunciante->id.'/logo') }}" alt="lc1.png" width="100">
                                <div class="media-body">
                                    <h5 class="mt-0 mb0">{{ $anuncio->anunciante->nome }}</h5>
                                    <a class="text-thm fone-anunciante" href="#">{{ Helper::Phone($anuncio->anunciante->telefone_comercial) }}</a>
                                  </div>
                            </div>

                            <a href="https://wa.me//55{{ $anuncio->anunciante->whatsapp }}?text=Tenho%20interesse%20no%20anúncio%20%20-%20%20{{ $anuncio->titulo }}"><div class="btn-whatsapp-corretor"><i class="fa-brands fa-whatsapp"></i> Fale com nossos corretores</div></a>
                            <a href="tel:+55{{ $anuncio->anunciante->telefone_comercial }}"><div class="btn-ligar-corretor"><i class="fa fa-mobile" aria-hidden="true"></i> Ligar para imobiliária</div></a>
                        </div>
                    </div>
		      	</div>
		    </div>
		</div>
	</div>
