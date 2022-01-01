<?php 
	$thnks_sub = fetchRow( "SELECT article_name, article_image, article_description FROM article WHERE article_key='THANK_YOU' " );
?>
			<tr>
				<td>
					<img border="0" src="<?php echo asset_url( $thnks_sub['article_image'] )?>" alt="<?php echo ucfirst( $thnks_sub['article_image'] )?>" style="display:block" width="100%" class="CToWUd">
				</td>
			</tr>
			<tr>
				<td>
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="95%">
					<tbody>
						<tr>
							<td style="color:#000000;font-family:Arial,Helvetica,sans-serif;font-size:16px;text-align:justify">
							<p style="margin-top:0px;padding-top:0px">
								<?php echo $thnks_sub["article_description"];?>
							</p>
							</td>
						</tr>
						<tr>
							<td height="10">&nbsp;</td>
						</tr>
					</tbody>
				</table>
				</td>
			</tr>
			