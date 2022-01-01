			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
                <td style="padding:0px;">
                	<center><p style="font-size:12px;padding:10px;margin:0;background:#eaeaea;text-align:center;color:#808080">&copy;<?php echo date('Y')." ".emailFrom();?></p></center>
                </td>
			</tr>
			<tr>
				<td align="right" style="font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; padding:6px;">
					<span style="font-size:74.5%; color:#666;"> 
						You can unsubscribe from the <?php echo emailFrom();?> notification via <a href="<?php echo site_url('home/unsubscribe?email_list_id='._en( @$newsletter_id ).'&email_id='._en( @$email_id ) ) ?>" target="_blank">this link</a> &nbsp;
					</span>
				</td>
			</tr>
		</tbody>
	</table>
</div>