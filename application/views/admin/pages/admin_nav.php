<nav role="navigation" class="navbar navbar-custom">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand"><?php echo $subtitle; ?></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">PEMBERITAHUAN
                        <b class="caret"></b>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li>
                            <a href="#">Pesan Pemberitahuan</a>
                        </li>
                    </ul>
				</li>
				<!-- <li class="disabled"><a href="#">Link</a></li> -->
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <?php echo strtoupper($login_name) . ' ['. strtoupper($login_level) .']' ?>
						<b class="caret"></b>
					</a>
					<ul role="menu" class="dropdown-menu">
						<li>
							<a href="#">Ubah Profil</a>
						</li>
						<li class="divider"></li>
						<li class="active">
							<a href="#">Keluar</a>
						</li>
					</ul>
				</li>
			</ul>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>