<!-- COMMENT -->
<div class="feedback" id="comment">
	<div class="fbHeader">
		<h2>{$lang->comment} <em>{$oDocument->getCommentcount()}</em></h2>
	</div>
	@if ($oDocument->getCommentcount())
		<ul class="fbList">
			@foreach ($oDocument->getComments() as $key => $comment)
				<li class="fbItem"|cond="!$comment->get('depth')" class="fbItem indent indent{($comment->get('depth'))}"|cond="$comment->get('depth')" id="comment_{$comment->comment_srl}">
					<div class="fbMeta">
						@if ($comment->getProfileImage())
							<img src="{$comment->getProfileImage()}" alt="Profile" class="profile" />
						@endif
						@if (!$comment->getProfileImage())
							<span class="profile"></span>
						@endif
						<h3 class="author">
							@if ($comment->member_srl <= 0 && $comment->homepage)
								<a href="{$comment->getHomepageUrl()}">{$comment->getNickName()}</a>
							@endif
							@if ($comment->member_srl <= 0 && !$comment->homepage)
								<strong>{$comment->getNickName()}</strong>
							@endif
							@if ($comment->member_srl > 0)
								<a href="#popup_menu_area" class="member_{$comment->member_srl}" onclick="return false">{$comment->getNickName()}</a>
							@endif
						</h3>
						<p class="time">{$comment->getRegdate('Y.m.d H:i')}</p>
					</div>
					@if ($comment->status == RX_STATUS_DELETED)
						<div class="rhymix_content xe_content deleted">{$lang->msg_deleted_comment}</div>
					@elseif ($comment->status == RX_STATUS_DELETED_BY_ADMIN)
						<div class="rhymix_content xe_content deleted deleted_by_admin">{$lang->msg_admin_deleted_comment}</div>
					@elseif (!$comment->isAccessible())
						<form action="./" method="get" class="rhymix_content xe_content" onsubmit="return procFilter(this, input_password)">
							<p><label for="cpw_{$comment->comment_srl}">{$lang->msg_is_secret} {$lang->msg_input_password}</label></p>
							<p><input type="password" name="password" id="cpw_{$comment->comment_srl}" class="iText" /><input type="submit" class="btn" value="{$lang->cmd_input}" /></p>
							<input type="hidden" name="mid" value="{$mid}" />
							<input type="hidden" name="page" value="{$page}" />
							<input type="hidden" name="document_srl" value="{$comment->get('document_srl')}" />
							<input type="hidden" name="comment_srl" value="{$comment->get('comment_srl')}" />
						</form>
					@else
						{$comment->getContent(false)|noescape}
					@endif
					@if ($comment->hasUploadedFiles())
						<div class="fileList">
							<button type="button" class="toggleFile" onclick="jQuery(this).next('ul.files').toggle();">{$lang->uploaded_file} [<strong>{$comment->get('uploaded_count')}</strong>]</button>
							<ul class="files">
								@foreach ($comment->getUploadedFiles() as $key => $file)
									<li><a href="{getUrl('')}{$file->download_url}">{$file->source_filename} <span class="fileSize">[File Size:{FileHandler::filesize($file->file_size)}/Download:{number_format($file->download_count)}]</span></a></li>
								@endforeach
							</ul>
						</div>
					@endif
					<p class="action">
						@if ($comment->get('voted_count')!=0)
							<span class="vote">{$lang->cmd_vote}:{$comment->get('voted_count')?$comment->get('voted_count'):0}</span>
						@endif
						@if ($oDocument->allowComment())
							<a href="{getUrl('', 'mid', $mid, 'act', 'dispBoardReplyComment', 'comment_srl', $comment->comment_srl)}" class="reply">{$lang->cmd_reply}</a>
						@endif
						@if ($comment->isGranted()||!$comment->get('member_srl'))
							<a href="{getUrl('', 'mid', $mid, 'act', 'dispBoardModifyComment', 'comment_srl', $comment->comment_srl)}" class="modify">{$lang->cmd_modify}</a>
							<a href="{getUrl('', 'mid', $mid, 'act', 'dispBoardDeleteComment', 'comment_srl', $comment->comment_srl)}" class="delete">{$lang->cmd_delete}</a>
						@endif
						@if ($is_logged)
							<a class="comment_{$comment->comment_srl} this" href="#popup_menu_area" onclick="return false">{$lang->cmd_comment_do}</a>
						@endif
					</p>
				</li>
			@endforeach
		</ul>
	@endif
	@if ($oDocument->comment_page_navigation)
		<div class="pagination">
			<a href="{getUrl('cpage',1)}#comment" class="direction prev"><span></span><span></span> {$lang->first_page}</a>
			@while ($page_no=$oDocument->comment_page_navigation->getNextPage())
				@if ($cpage==$page_no)
					<strong>{$page_no}</strong>
				@endif
				@if ($cpage!=$page_no)
					<a href="{getUrl('cpage',$page_no)}#comment">{$page_no}</a>
				@endif
			@endwhile
			<a href="{getUrl('cpage',$oDocument->comment_page_navigation->last_page)}#comment" class="direction next">{$lang->last_page} <span></span><span></span></a>
		</div>
	@endif
	@if ($grant->write_comment && $oDocument->isEnableComment())
		<form action="./" method="post" onsubmit="return procFilter(this, insert_comment)" class="write_comment" id="write_comment">
			<input type="hidden" name="mid" value="{$mid}" />
			<input type="hidden" name="document_srl" value="{$oDocument->document_srl}" />
			<input type="hidden" name="comment_srl" value="" />
			<input type="hidden" name="content" value="" />
			{$oDocument->getCommentEditor()|noescape}
			<div class="write_author">
				@if (!$is_logged)
					<span class="item">
						<label for="userName" class="iLabel">{$lang->writer}</label>
						<input type="text" name="nick_name" id="userName" class="iText userName" />
					</span>
					<span class="item">
						<label for="userPw" class="iLabel">{$lang->password}</label>
						<input type="password" name="password" id="userPw" class="iText userPw" />
					</span>
					<span class="item">
						<label for="homePage" class="iLabel">{$lang->homepage}</label>
						<input type="text" name="homepage" id="homePage" class="iText homePage" />&nbsp;
					</span>
				@endif
				@if ($is_logged)
					<input type="checkbox" name="notify_message" value="Y" id="notify_message" class="iCheck" />
					<label for="notify_message">{$lang->notify}</label>
				@endif
				@if ($module_info->secret=='Y')
					<input type="checkbox" name="is_secret" value="Y" id="is_secret" class="iCheck" />
					<label for="is_secret">{$lang->secret}</label>
				@endif
			</div>
			@if (isset($captcha) && $captcha && $captcha->isTargetAction('comment'))
				<div class="write_captcha">
					{$captcha}
				</div>
			@endif
			<div class="btnArea">
				<button type="submit" class="btn">{$lang->cmd_comment_registration}</button>
			</div>
		</form>
	@endif
</div>
<div class="fbFooter">
	<a href="{getUrl('document_srl','')}" class="btn">{$lang->cmd_list}</a>
</div>
<!-- /COMMENT -->
