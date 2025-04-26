<div class="board_read">
	<!-- READ HEADER -->
	<div class="read_header">
		<h1>
			@if ($module_info->use_category=='Y')
				<a href="{getUrl('', 'mid', $mid, 'category', $oDocument->get('category_srl'))}" class="category">{$category_list[$oDocument->get('category_srl')]->title}</a>
			@endif
			<a href="{$oDocument->getUrl()}">{$oDocument->getTitle()}</a>
		</h1>
		<p class="time">
			{$oDocument->getRegdate('Y.m.d H:i')}
		</p>
		<p class="meta">
			@if (($module_info->display_author ?? 'Y') !== 'N' && $oDocument->getMemberSrl() <= 0 && $oDocument->isExistsHomepage())
				<a href="{$oDocument->getHomepageUrl()}" target="_blank" rel="noopener" class="author">{$oDocument->getNickName()}</a>
			@endif
			@if (($module_info->display_author ?? 'Y') !== 'N' && $oDocument->getMemberSrl() <= 0 && !$oDocument->isExistsHomepage())
					{$oDocument->getNickName()}
			@endif
			@if (($module_info->display_author ?? 'Y') !== 'N' && $oDocument->getMemberSrl() > 0)
					<a href="#popup_menu_area" class="member_{$oDocument->get('member_srl')} author" onclick="return false">{$oDocument->getNickName()}</a>
			@endif
			<span class="sum">
				<span class="read">{$lang->readed_count}:{$oDocument->get('readed_count')}</span>
				@if ($oDocument->get('voted_count')!=0)
				<span class="vote">{$lang->cmd_vote}:{$oDocument->get('voted_count')}</span>
				@endif
			</span>
		</p>
	</div>
	<!-- /READ HEADER -->
	<!-- Extra Output -->
	@if ($oDocument->isExtraVarsExists() && $oDocument->isAccessible())
	<div class="exOut">
		<table border="1" cellspacing="0" summary="Extra Form Output">
			@foreach ($oDocument as $key => $val)
				@if ($val->hasValue())
					<tr>
						<th scope="row">{$val->name}</th>
						<td>{$val->getValueHTML()}&nbsp;</td>
					</tr>
				@endif
			@endforeach
		</table>
	</div>
	@endif
	<!-- /Extra Output -->
	<!-- READ BODY -->
	<div class="read_body">
		@if (!$oDocument->isAccessible())
			<form action="./" method="get" onsubmit="return procFilter(this, input_password)">
				<input type="hidden" name="mid" value="{$mid}" />
				<input type="hidden" name="page" value="{$page}" />
				<input type="hidden" name="document_srl" value="{$oDocument->document_srl}" />
				<p><label for="cpw">{$lang->msg_is_secret} {$lang->msg_input_password}</label></p>
				<p><input type="password" name="password" id="cpw" class="iText" /><input type="submit" value="{$lang->cmd_input}" class="btn" />
				</p>
			</form>
		@else
			{$oDocument->getContent(false)|noescape}
		@endif
	</div>
	<!-- /READ BODY -->
	<!-- READ FOOTER -->
	<div class="read_footer">
		@if ($oDocument->hasUploadedFiles())
		<div class="fileList">
			<button type="button" class="toggleFile" onclick="jQuery(this).next('ul.files').toggle();">{$lang->uploaded_file} [<strong>{$oDocument->get('uploaded_count')}</strong>]</button>
			<ul class="files">
				@foreach ($oDocument->getUploadedFiles() as $key => $file)
					<li><a href="{getUrl('')}{$file->download_url}">{$file->source_filename} <span class="fileSize">[File Size:{FileHandler::filesize($file->file_size)}/Download:{number_format($file->download_count)}]</span></a></li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="tns">
			{@ $tag_list = $oDocument->get('tag_list') }
			@if (count($tag_list ?: []))
				<span class="tags">
					<!--@foreach($tag_list as $tag)-->
						<a href="{getUrl('', 'mid', $mid, 'search_target', 'tag', 'search_keyword', $tag)}" class="tag" rel="tag">{escape($tag, false)}</a><span>,</span>
					<!--@end-->
				</span>
			@endif
			<a class="document_{$oDocument->document_srl} action" href="#popup_menu_area" onclick="return false">{$lang->cmd_document_do}</a>
			<ul class="sns">
				<li class="twitter link"><a href="https://twitter.com/">Twitter</a></li>
				<li class="facebook link"><a href="https://www.facebook.com/">Facebook</a></li>
				<li class="delicious link"><a href="https://delicious.com/">Delicious</a></li>
			</ul>
			<script>
				var sTitle = {json_encode($oDocument->getTitleText())};
				jQuery(function($){
					$('.twitter>a').snspost({
						type : 'twitter',
						content : sTitle + ' {$oDocument->getPermanentUrl()}'
					});
					$('.facebook>a').snspost({
						type : 'facebook',
						content : sTitle
					});
					$('.delicious>a').snspost({
						type : 'delicious',
						content : sTitle
					});
				});
			</script>
		</div>
		@if ($module_info->display_sign!='N'&&($oDocument->getProfileImage()||$oDocument->getSignature()))
			<div class="sign">
				@if ($oDocument->getProfileImage())
				<img src="{$oDocument->getProfileImage()}" alt="Profile" class="pf" />
				@endif
				@if ($oDocument->getSignature())
				<div class="tx">{$oDocument->getSignature()}</div>
				@endif
			</div>
		@endif
		<div class="btnArea">
			@if ($oDocument->isEditable())
				<a class="btn" href="{getUrl('', 'mid', $mid, 'act', 'dispBoardWrite', 'document_srl', $oDocument->document_srl)}">{$lang->cmd_modify}</a>
				<a class="btn" href="{getUrl('', 'mid', $mid, 'act', 'dispBoardDelete', 'document_srl', $oDocument->document_srl)}">{$lang->cmd_delete}</a>
			@endif
			<span class="etc">
				<a href="{getUrl('document_srl','')}" class="btn">{$lang->cmd_list}</a>
			</span>
		</div>
	</div>
	<!-- /READ FOOTER -->
</div>
@if ($oDocument->allowTrackback())
	<include target="_trackback.blade.php" />
@endif
<include target="_comment.blade.php" />
