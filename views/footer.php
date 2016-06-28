			</div>
		</div>
		<aside id="sidebar">
			<strong class="logo"><a href="#">lg</a></strong>
			<ul class="tabset buttons">
				<li <?php echo (Session::get('page') == 'list') ? 'class="active"' : null ; ?>>
					<a href="#tab-3" id="tab3" class="ico3" <?php echo (is_null($atad['id']) && is_null($_GET['id']) && is_null($_GET['jur'])) ? '' : 'onclick="window.location='."'".$link."#tab-3'".'"' ; ?>><span>Data Inventaris</span><em class="tampil"></em></a>
					<span class="nampak"><span>Data Inventaris</span></span>
				</li>
				<li <?php echo (Session::get('page') == 'form') ? 'class="active"' : null ; ?>>
					<a href="#tab-2" class="ico4" <?php echo (is_null($_GET['id']) && is_null($_GET['jur'])) ? '' : 'onclick="window.location='."'".$link."#tab-2'".'"' ; ?>><span>Form Inventaris</span><em class="tampil"></em></a>
					<span class="nampak"><span>Form Inventaris</span></span>
				</li>
				<li>
					<a href="#tab-4" class="ico5" <?php echo (is_null($atad['id']) && is_null($_GET['id']) && is_null($_GET['jur'])) ? '' : 'onclick="window.location='."'".$link."#tab-4'".'"' ; ?>><span>Laporan</span><em class="tampil"></em></a>
					<span class="nampak"><span>Laporan</span></span>
				</li>
				<li <?php echo (isset($_GET['id'])) ? 'class="active"' : null ; ?>>
					<a href="#tab-7" class="ico8" <?php echo (is_null($atad['id']) && is_null($_GET['jur'])) ? '' : 'onclick="window.location='."'".$link."#tab-7'".'"' ; ?>><span>Form Profil</span><em class="tampil"></em></a>
					<span class="nampak"><span>Form Profil</span></span>
				</li>
				<?php if (Session::get('status') == 2){ ?>
				<li>
					<a href="#tab-8" id="tab8" class="ico7" <?php echo (is_null($atad['id']) && is_null($_GET['id']) && is_null($_GET['jur'])) ? '' : 'onclick="window.location='."'".$link."#tab-8'".'"' ; ?>><span>Data Profil</span><em class="tampil"></em></a>
					<span class="nampak"><span>Data Profil</span></span>
				</li>
				<li>
					<a href="#tab-5" id="tab5" class="ico1"><span>Data Kepala Dinas dan SKPD</span><em class="tampil"></em></a>
					<span class="nampak"><span>Data Kepala Dinas dan SKPD</span></span>
				</li>
				<li <?php echo (isset($_GET['jur'])) ? 'class="active"' : null ; ?>>
					<a href="#tab-1" id="tab1" class="ico2" <?php echo (is_null($atad['id']) && is_null($_GET['id'])) ? '' : 'onclick="window.location='."'".$link."#tab-1'".'"' ; ?>><span>Form Jurusan</span><em class="tampil"></em></a>
					<span class="nampak"><span>Form Jurusan</span></span>
				</li>
				<li>
					<a href="#tab-6" id="tab6" class="ico6" <?php echo (is_null($atad['id']) && is_null($_GET['id']) && is_null($_GET['jur'])) ? '' : 'onclick="window.location='."'".$link."#tab-6'".'"' ; ?>><span>Data Jurusan</span><em class="tampil"></em></a>
					<span class="nampak"><span>Data Jurusan</span></span>
				</li>
				<?php } ?>
			</ul>
			<span class="shadow"></span>
		</aside>
	</div>
</body>
	<link href="<?php echo X ?>public/css/all.css" media="all" rel="stylesheet" type="text/css" />
	<!-- <link href="<?php echo X ?>public/css/demo_page.css" media="all" rel="stylesheet" type="text/css" /> -->
	<link href="<?php echo X ?>public/css/demo_table_jui.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php echo X ?>public/css/jquery-ui-1.8.4.custom.css" media="all" rel="stylesheet" type="text/css" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo X ?>public/css/bootstrap.min.css" />	
	<script type="text/javascript" src="<?php echo X ?>public/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo X ?>public/js/jquery.main.js"></script>
	<script type="text/javascript" src="<?php echo X ?>public/js/jquery-ui-1.10.4.custom.js"></script>
	<script type="text/javascript" src="<?php echo X ?>public/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(function() {
			$('.example').dataTable({
				'bJQueryUI': true,
				'sPaginationType': 'full_numbers'
			});
			$('#date').datepicker({
				changeMonth: true,
				changeYear: true,
				showAnim: 'blind',
				dateFormat: 'dd-mm-yy'
			});
			$('#nama').autocomplete({
				source: '<?php echo X ?>index/item',
				select: function(event, value){
					$('#id_barang').val(value.item.id);
					$('#nama').val(value.item.nama);
				},
				minLength:1
			});

			$('#tahun').html('<?php echo $tahun ?>');
			$('#bulan').html('<?php echo $bulan ?>');
			
			$('#tahun').change(function(){
				var tahun = $(this).val();
				var bulan = $('#bulan').val();
				window.location='<?php echo X."index/read/" ?>'+tahun+'/'+bulan;
			});
			
			$('#bulan').change(function(){
				var tahun = $('#tahun').val();
				var bulan = $(this).val();
				window.location='<?php echo X."index/read/" ?>'+tahun+'/'+bulan;
			});

			$('#tab3').click(function(){
				$('.filter').removeAttr('style');
			});

			$('#tab8').click(function(){
				$('.filter').attr('style','display:none');
			});

			$('#tab6').click(function(){
				$('.filter').attr('style','display:none');
			});

			$('#thn').html('<?php echo $tahun ?>');
			$('#bln').html('<?php echo $bulan ?>');
			
			$('#thn').change(function(){
				var nuhat = $(this).val();
				var nalub = $('#bln').val();
				var type = $('#type').val();
				var lru = '<?php echo X ?>index/report/'+type+'/'+nuhat+'/'+nalub;
				$('#form').attr('action',lru);
				$.ajax({
			        url: lru,
			        success: function(b){
			            $('#laporan').html(b);
			        }
			    });
			});
			$('#bln').change(function(){
				var nalub = $(this).val();
				var nuhat = $('#thn').val();
				var type = $('#type').val();
				var lru = '<?php echo X ?>index/report/'+type+'/'+nuhat+'/'+nalub;
				$('#form').attr('action',lru);
				$.ajax({
			        url: lru,
			        success: function(b){
			            $('#laporan').html(b);
			        }
			    });
			});

			$('#type').change(function(){
				var type = $(this).val();
				var nalub = $('#bln').val();
				var nuhat = $('#thn').val();
				var lru = '<?php echo X ?>index/report/'+type+'/'+nuhat+'/'+nalub;
				$('#form').attr('action',lru);
				$.ajax({
			        url: lru,
			        success: function(b){
			            $('#laporan').html(b);
			        }
			    });
			});

			$('#bln').change();
			$('#thn').change();
		});
	</script>
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="public/css/ie.css" /><![endif]-->
</html>