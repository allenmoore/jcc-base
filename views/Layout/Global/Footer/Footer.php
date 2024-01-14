	</main>
	<footer class="site-footer">
		<div class="container-fluid -column">
			<div class="footer-logo">
				<?php
					$logoLocation = '-footer';
					include( locate_template( 'views/Modules/Logo.php' ) );
				?>
			</div>
			<nav class="footer-social" aria-label="Footer social navigation">
				<ul class="nav-list -social">
					<li class="nav-item -social">
						<a class="nav-link -social" aria-label="Like WPBase on Facebook" href="https://goo.gl/oxQ3Sf" title="Permaink to: Like WPBase on Facebook. Link opens in a new window." target="_blank">
							<svg class="svg-facebook" viewBox="0 0 13 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
								<path d="M12.012 13.5l.666-4.343H8.511V6.338c0-1.188.582-2.347 2.448-2.347h1.895V.293S11.135 0 9.491 0C6.059 0 3.815 2.08 3.815 5.846v3.311H0V13.5h3.815V24h4.696V13.5h3.501z" fill-rule="nonzero"/>
							</svg>
							<span class="screen-reader-text">WPBase on Facebook</span></a>
					</li>
					<li class="nav-item -social">
						<a class="nav-link -social" aria-label="Follow WPBase on Twitter" href="https://goo.gl/3VgxKv" title="Permaink to: Follow WPBase on Twitter. Link opens in a new window." target="_blank">
							<svg class="svg-twitter" viewBox="0 0 24 20" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
								<path d="M21.533 4.858c.015.213.015.426.015.639 0 6.503-4.949 13.995-13.995 13.995-2.786 0-5.375-.807-7.553-2.208.396.046.777.061 1.188.061a9.848 9.848 0 006.106-2.101 4.93 4.93 0 01-4.599-3.411c.305.045.61.076.929.076.442 0 .884-.061 1.295-.168A4.919 4.919 0 01.975 6.914v-.061a4.95 4.95 0 002.223.624 4.915 4.915 0 01-2.193-4.096c0-.914.244-1.752.67-2.483a13.984 13.984 0 0010.142 5.148 5.565 5.565 0 01-.122-1.127A4.917 4.917 0 0116.614 0c1.416 0 2.696.594 3.594 1.553A9.663 9.663 0 0023.33.365a4.906 4.906 0 01-2.162 2.711A9.867 9.867 0 0024 2.315a10.6 10.6 0 01-2.467 2.543z" fill-rule="nonzero"/>
							</svg>
							<span class="screen-reader-text">WPBase on Twitter</span></a>
					</li>
					<li class="nav-item -social">
						<a class="nav-link -social" aria-label="Follow WPBase on Instagram" href="https://goo.gl/3HhrnC" title="Permaink to: Follow WPBase on Instragram. Link opens in a new window." target="_blank">
							<svg class="svg-instagram" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
								<path d="M12.003 5.845a6.142 6.142 0 00-6.152 6.152 6.141 6.141 0 006.152 6.152 6.142 6.142 0 006.152-6.152 6.143 6.143 0 00-6.152-6.152zm0 10.152c-2.201 0-4-1.794-4-4a4.003 4.003 0 014-3.999 4.002 4.002 0 013.999 3.999c0 2.206-1.799 4-3.999 4zm7.838-10.403c0 .798-.642 1.435-1.435 1.435a1.435 1.435 0 111.435-1.435zm4.075 1.456c-.091-1.922-.53-3.625-1.939-5.027C20.575.62 18.872.181 16.95.084c-1.981-.112-7.919-.112-9.9 0-1.917.091-3.619.53-5.027 1.933C.614 3.42.181 5.123.084 7.045c-.112 1.981-.112 7.919 0 9.9.091 1.922.53 3.624 1.939 5.027 1.408 1.403 3.105 1.842 5.027 1.938 1.981.113 7.919.113 9.9 0 1.922-.091 3.625-.53 5.027-1.938 1.403-1.403 1.842-3.105 1.939-5.027.112-1.981.112-7.914 0-9.895zm-2.56 12.02a4.047 4.047 0 01-2.28 2.281c-1.58.626-5.328.482-7.073.482-1.746 0-5.499.139-7.073-.482a4.048 4.048 0 01-2.281-2.281c-.626-1.579-.482-5.327-.482-7.073 0-1.745-.139-5.498.482-7.073a4.05 4.05 0 012.281-2.28c1.579-.627 5.327-.482 7.073-.482 1.745 0 5.498-.139 7.073.482a4.048 4.048 0 012.28 2.28c.627 1.58.482 5.328.482 7.073 0 1.746.145 5.499-.482 7.073z" fill-rule="nonzero"/>
							</svg>
							<span class="screen-reader-text">WPBase on Instagram</span></a>
					</li>
					<li class="nav-item -social">
						<a class="nav-link -social" aria-label="Subscribe to WPBase on YouTube" href="https://goo.gl/yy3F5L" title="Permaink to: Subscribe WPBase on YouTube. Link opens in a new window." target="_blank">
							<svg class="svg-youtube" viewBox="0 0 24 17" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
								<path d="M23.498 2.64A3.016 3.016 0 0021.377.505C19.505 0 12 0 12 0S4.495 0 2.623.505A3.016 3.016 0 00.502 2.64C0 4.524 0 8.455 0 8.455s0 3.93.502 5.814a2.97 2.97 0 002.121 2.101c1.872.505 9.377.505 9.377.505s7.505 0 9.377-.505a2.97 2.97 0 002.121-2.101C24 12.385 24 8.455 24 8.455s0-3.931-.502-5.815zM9.545 12.023V4.886l6.273 3.569-6.273 3.568z" fill-rule="nonzero"/>
							</svg>
							<span class="screen-reader-text">WPBase on YouTube</span></a>
					</li>
				</ul>
			</nav>
			<div class="footer-address">
				245 College Road | PO Box 2350<br>
				Smithfield, NC 27577<br>
				<a aria-label="Call WPBase at (919) 934-3051" href="tel:919-934-3051" title="Call WPBase at (919) 934-3051">(919) 934-3051</a>
			</div>
		</div>
	</footer>
	<button id="js-back-to-top-btn" class="scroll-button" aria-label="Scroll to the top of the page">
		<span class="screen-reader-text">Scroll to the top</span>
		<svg class="svg-arrow" viewBox="0 0 24 15" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2">
			<path d="M12.93.412l10.649 10.649a1.316 1.316 0 010 1.86l-1.242 1.242a1.315 1.315 0 01-1.858.002L12 5.726l-8.479 8.439a1.315 1.315 0 01-1.858-.002L.421 12.921a1.316 1.316 0 010-1.86L11.07.412a1.316 1.316 0 011.86 0z" fill-rule="nonzero"/>
		</svg>
	</button>
