<include target="_header.blade.php" />
<div class="context_message">
    <h1>{{$message}}</h1>
    <div class="btnArea">
		@if (!$is_logged)
			<a class="btn" href="{{getUrl('act','dispMemberLoginForm')}}">{{$lang->cmd_login}}</a>
		@endif
        <button type="button" class="btn" onclick="history.back()">{{$lang->cmd_back}}</button>
    </div>
</div>
<include target="_footer.blade.php" />
