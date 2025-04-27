@include ('_header.blade.php')
@if ($oComment->isExists())
	<div class="context_data">
		<h3 class="author">
			@if ($oComment->homepage)
				<a href="{{$oComment->homepage}}">{{$oComment->getNickName()}}</a>
			@endif
			@if (!$oComment->homepage)
				<strong>{{$oComment->getNickName()}}</strong>
			@endif
		</h3>
		{{$oComment->getContent(false)|noescape}}
	</div>
@endif
<form action="./" method="get" onsubmit="return procFilter(this, delete_comment)" class="context_message">
	<input type="hidden" name="mid" value="{{$mid}}" />
	<input type="hidden" name="page" value="{{$page}}" />
	<input type="hidden" name="document_srl" value="{{$oComment->get('document_srl')}}" />
	<input type="hidden" name="comment_srl" value="{{$oComment->get('comment_srl')}}" />
	<h1>{{sprintf($lang->comfirm_act_msg,$lang->comment,$lang->cmd_delete,$lang->msg_eul)}}</h1>
	<div class="btnArea">
		<input type="submit" class="btn" value="{{$lang->cmd_delete}}" />
		<button type="button" class="btn" onclick="history.back()">{{$lang->cmd_cancel}}</button>
	</div>
</form>
@include ('_footer.blade.php')
