<include target="_header.blade.php" />
<form action="./" method="post" onsubmit="return procFilter(this, window.insert)" class="board_write">
	<input type="hidden" name="mid" value="{{$mid}}" />
	<input type="hidden" name="content" value="{{$oDocument->getContentText()}}" />
	<input type="hidden" name="document_srl" value="{{$document_srl}}" />
	<div class="write_header">
		@if ($module_info->use_category=='Y')
			<select name="category_srl">
				<option value="">{{$lang->category}}</option>
				@foreach ($category_list as $val)
					<option @disabled(!$val->grant) value="{{$val->category_srl}}" @selected($val->grant&&$val->selected||$val->category_srl==$oDocument->get('category_srl'))>
						{{str_repeat("&nbsp;&nbsp;",$val->depth)}} {{$val->title}} ({{$val->document_count}})
					</option>
				@endforeach
			</select>
		@endif
		@if ($oDocument->getTitleText())
			<input type="text" name="title" class="iText" title="{{$lang->title}}" value="{{escape($oDocument->getTitleText(), false)}}" />
		@endif
		@if (!$oDocument->getTitleText())
			<input type="text" name="title" class="iText" title="{{$lang->title}}" />
		@endif
		@if ($grant->manager)
			<select name="is_notice">
				<option value="N" @selected($oDocument->get('is_notice') === 'N')>{{$lang->not_notice}}</option>
				<option value="Y" @selected($oDocument->get('is_notice') === 'Y')>{{$lang->notice}}</option>
				<option value="A" @selected($oDocument->get('is_notice') === 'A')>{{$lang->notice_all}}</option>
			</select>
		@endif
	</div>
	@if (count($extra_keys))
		<div class="exForm">
			<table border="1" cellspacing="0" summary="Extra Form">
				<caption><em>*</em> : {{$lang->is_required}}</caption>
				@foreach ($extra_keys as $key => $val)
					<tr>
						<th scope="row">
							@if ($val->is_required=='Y')
								<em>*</em>
							@endif
							{{$val->name}}
						</th>
						<td>{{$val->getFormHTML()}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	@endif
    <div class="write_editor">
		{{$oDocument->getEditor()|noescape}}
	</div>
	<div class="write_footer">
		<div class="write_option">
			@if ($grant->manager)
				<input type="checkbox" name="title_bold" id="title_bold" class="iCheck" value="Y" @checked($oDocument->get('title_bold')=='Y') />
				<label for="title_bold">{{$lang->title_bold}}</label>
			@endif
			@if ($module_info->secret=='Y')
				<input type="checkbox" name="is_secret" class="iCheck" value="Y" @checked($oDocument->isSecret()) id="is_secret" />
				<label for="is_secret">{{$lang->secret}}</label>
			@endif
            <input type="checkbox" name="comment_status" class="iCheck" value="ALLOW" @checked($oDocument->allowComment()) id="comment_status" />
            <label for="comment_status">{{$lang->allow_comment}}</label>
            <input type="checkbox" name="allow_trackback" class="iCheck" value="Y" @checked($oDocument->allowTrackback()) id="allow_trackback" />
            <label for="allow_trackback">{{$lang->allow_trackback}}</label>
			@if ($is_logged)
				<input type="checkbox" name="notify_message" class="iCheck" value="Y" @checked($oDocument->useNotify()) id="notify_message" />
				<label for="notify_message">{{$lang->notify}}</label>
			@endif
			@if (is_array($status_list))
				@foreach ($status_list as $key=>$value)
				<input type="radio" name="status" value="{{$key}}" id="{{$key}}" <!--@if($oDocument->get('status') == $key || ($key == 'PUBLIC' && !$document_srl))-->checked="checked"<!--@end--> />
				<label for="{{$key}}">{{$value}}</label>
				@endforeach
			@endif
		</div>
		<div class="write_author">
			@if (!$is_logged)
				<span class="item">
					<label for="userName" class="iLabel">{{$lang->writer}}</label>
					<input type="text" name="nick_name" id="userName" class="iText userName" style="width:80px" value="{{escape($oDocument->get('nick_name'), false)}}" />
				</span>
				<span class="item">
					<label for="userPw" class="iLabel">{{$lang->password}}</label>
					<input type="password" name="password" id="userPw" class="iText userPw" style="width:80px" />
				</span>
				<span class="item">
					<label for="homePage" class="iLabel">{{$lang->homepage}}</label>
					<input type="text" name="homepage" id="homePage" class="iText homePage"  style="width:140px"value="{{escape($oDocument->get('homepage'), false)}}" />
				</span>
			@endif
			<span class="item">
				<label for="tags" class="iLabel">{{$lang->tag}}: {{$lang->about_tag}}</label>
				<input type="text" name="tags" id="tags" value="{{escape($oDocument->get('tags') ?? '', false)}}" class="iText" style="width:300px" title="Tag" />
			</span>
		</div>
		@if (isset($captcha) && $captcha && $captcha->isTargetAction('document'))
			<div class="write_captcha">
				{{$captcha}}
			</div>
		@endif
		<div class="btnArea">
			<input type="submit" value="{{$lang->cmd_registration}}" class="btn" />
			@if (!$oDocument->isExists() || $oDocument->get('status') == 'TEMP')
				@if ($is_logged)
					<button class="btn" type="button" onclick="doDocumentSave(this);">{{$lang->cmd_temp_save}}</button>
					<button class="btn" type="button" onclick="doDocumentLoad(this);">{{$lang->cmd_load}}</button>
				@endif
			@endif
		</div>
	</div>
</form>
<include target="_footer.blade.php" />
