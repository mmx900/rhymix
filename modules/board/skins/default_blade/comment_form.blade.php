@include ('_header.blade.php')
@if ($oSourceComment->isExists())
	<div class="context_data">
		<h3 class="author">
			@if ($oSourceComment->homepage)
				<a href="{{$oSourceComment->homepage}}">{{$oSourceComment->getNickName()}}</a>
			@endif
			@if (!$oSourceComment->homepage)
				<strong>{{$oSourceComment->getNickName()}}</strong>
			@endif
		</h3>
		{{$oSourceComment->getContent(false)|noescape}}
</div>
@endif
<div class="feedback">
	<form action="./" method="post" onsubmit="return procFilter(this, insert_comment)" class="write_comment">
		<input type="hidden" name="mid" value="{{$mid}}" />
		<input type="hidden" name="document_srl" value="{{$oComment->get('document_srl')}}" />
		<input type="hidden" name="comment_srl" value="{{$oComment->get('comment_srl')}}" />
		<input type="hidden" name="parent_srl" value="{{$oComment->get('parent_srl')}}" />
        <input type="hidden" name="content" value="{{htmlspecialchars($oComment->get('content'))}}" />
		{{$oComment->getEditor()|noescape}}
		<div class="write_author">
			@if (!$is_logged)
				<span class="item">
					<label for="userName" class="iLabel">{{$lang->writer}}</label>
					<input type="text" name="nick_name" id="userName" class="iText userName" value="{{$oComment->getNickName()}}" />
				</span>
				<span class="item">
					<label for="userPw" class="iLabel">{{}$lang->password}}</label>
					<input type="password" name="password" id="userPw" class="iText userPw" />
				</span>
				<span class="item">
					<label for="homePage" class="iLabel">{{$lang->homepage}}</label>
					<input type="text" name="homepage" id="homePage" class="iText homePage" value="{{htmlspecialchars($oComment->get('homepage'))}}" />
				</span>
			@endif
			@if ($is_logged)
				<input type="checkbox" name="notify_message" value="Y" @checked($oComment->get('notify_message')=='Y') id="notify_message" class="iCheck" />
				<label for="notify_message">{{$lang->notify}}</label>
			@endif
			@if ($module_info->secret=='Y')
				<input type="checkbox" name="is_secret" value="Y" id="is_secret" @checked($oComment->get('is_secret')=='Y') class="iCheck" />
				<label for="is_secret">{{$lang->secret}}</label>
			@endif
		</div>
		@if (isset($captcha) && $captcha && $captcha->isTargetAction('comment'))
			<div class="write_captcha">
				{{$captcha}}
			</div>
		@endif
		<div class="btnArea">
			<button type="submit" class="btn">{{$lang->cmd_comment_registration}}</button>
		</div>
	</form>
</div>
@include ('_footer.blade.php')
