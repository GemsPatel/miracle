			<!--FOOTER-->
			<footer id="footer">
				<div class="footer">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="text-center">
                                	<p>
                                		<!-- &copy Mirable Bahrain. All rights reserved. Villa 53,Bani Otbah Avenue,Road 2502, Gudaibiya,Block 325, Kingdom of Bahrain - Tel: +973 77 022 222 -->
                                		<?php echo getField( "config_value" , "configuration", "config_key", "COPY_RIGHT")." ".getField( "config_value" , "configuration", "config_key", "ADDRESS")." - TEL: ".getField( "config_value" , "configuration", "config_key", "TOLL_FREE_NO");?>
                                	</p>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!--FOOTER-->
		</div>
		<style>
			.col_1 { background: #97cd9d !important; }
			.col_2 { background: #f8a084 !important; }
			.col_3 { background: #8cc0c7 !important; }
			.col_4 { background: #ad7085 !important; }
			.col_5 { background: #e4aa44 !important; }
		</style>
		<script src="<?php echo asset_url('js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo asset_url('js/bootstrap.bundle.min.js');?>"></script>
		<script>
			$(document).ready(function(){
				var max = 5, min = 1;
				
				
//                 var checkScrollBar = function(){
    				 
//     				var scroll = $(window).scrollTop(); 
    			    
//     			    if( scroll %15 == 0 )
//     			    {
    			        //remove
                        $('#navbar .navbar').removeClass("col_1").removeClass("col_2").removeClass("col_3").removeClass("col_4").removeClass("col_5");
        				 
                        var rand_number = Math.floor(Math.random()*(max-min+1)+min);
        				 
                        $('#navbar .navbar').addClass( "col_"+rand_number ); 
//     			    }
//     			}
    			
//     			$(window).on('load scroll',  checkScrollBar );
			 });
		</script>
		
		<script>
    	    document.addEventListener("contextmenu", function(e){
                e.preventDefault();
            }, false);
            
            document.onkeydown = function(e) {
                if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {
                    //Alt+c, Alt+v will also be disabled sadly.
    //                 alert('not allowed');
                }
                return false;
            };
    	</script>
	</body>
</html>
