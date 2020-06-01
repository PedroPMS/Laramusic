@extends('site.templates.template')

@section('content')

<section class="albuns">
		<div class="container">
			<h1 class="title">
				Últimos Albúns:
			</h1>
			<div class="list-albuns col-md-12">
				<article class="col-md-3 albun">
					<a href="album">
						<div class="image-album">
							<img src="{{url('assets/site/imgs/sitekit-laramusic.png')}}" alt="Nome Albun" class="img-albun">

							<div class="hover-img-album">
								<i class="fa fa-headphones"></i>
							</div>
						</div>
						<h1 class="title-albun">Nome do Álbum</h1>
					</a>
				</article>
				<article class="col-md-3 albun">
					<a href="album">
						<div class="image-album">
							<img src="{{url('assets/site/imgs/sitekit-laramusic.png')}}" alt="Nome Albun" class="img-albun">

							<div class="hover-img-album">
								<i class="fa fa-headphones"></i>
							</div>
						</div>
						<h1 class="title-albun">Nome do Álbum</h1>
					</a>
				</article>
				<article class="col-md-3 albun">
					<a href="album">
						<div class="image-album">
							<img src="{{url('assets/site/imgs/sitekit-laramusic.png')}}" alt="Nome Albun" class="img-albun">

							<div class="hover-img-album">
								<i class="fa fa-headphones"></i>
							</div>
						</div>
						<h1 class="title-albun">Nome do Álbum</h1>
					</a>
				</article>
				<article class="col-md-3 albun">
					<a href="album">
						<div class="image-album">
							<img src="{{url('assets/site/imgs/sitekit-laramusic.png')}}" alt="Nome Albun" class="img-albun">

							<div class="hover-img-album">
								<i class="fa fa-headphones"></i>
							</div>
						</div>
						<h1 class="title-albun">Nome do Álbum</h1>
					</a>
				</article>				
					
			</div><!--End list-albuns-->
		</div><!--End Container-->
	</section><!--End Abuns-->

	<div class="clear"></div>
	<hr class="hr">

	<section class="estilos">
		<div class="container">
			<h1 class="title">Estilos:</h1>

			<div class="estiulos-mu col-md-12">
				<div class="col-md-3">
					<a href="estilo" class="estilo">Eletrônica</a>
					<a href="estilo" class="estilo">Rock</a>
					<a href="estilo" class="estilo">Hap</a>
					<a href="estilo" class="estilo">Pop</a>
					<a href="estilo" class="estilo">Funk</a>
					<a href="estilo" class="estilo">Sertanejo</a>
				</div>
				<div class="col-md-3">
					<a href="estilo" class="estilo">Eletrônica</a>
					<a href="estilo" class="estilo">Rock</a>
					<a href="estilo" class="estilo">Hap</a>
					<a href="estilo" class="estilo">Pop</a>
					<a href="estilo" class="estilo">Funk</a>
					<a href="estilo" class="estilo">Sertanejo</a>
				</div>
				<div class="col-md-3">
					<a href="estilo" class="estilo">Eletrônica</a>
					<a href="estilo" class="estilo">Rock</a>
					<a href="estilo" class="estilo">Hap</a>
					<a href="estilo" class="estilo">Pop</a>
					<a href="estilo" class="estilo">Funk</a>
					<a href="estilo" class="estilo">Sertanejo</a>
				</div>
				<div class="col-md-3">
					<a href="estilo" class="estilo">Eletrônica</a>
					<a href="estilo" class="estilo">Rock</a>
					<a href="estilo" class="estilo">Hap</a>
					<a href="estilo" class="estilo">Pop</a>
					<a href="estilo" class="estilo">Funk</a>
					<a href="estilo" class="estilo">Sertanejo</a>
				</div>
			</div><!--end estiulos-mu-->
		</div><!--End Container-->
	</section><!--End estilos-->

@endsection