<!-- TRACKBACK -->
<div class="feedback" id="trackback">
	<div class="fbHeader">
		<h2>{{$lang->trackback}} <em>{{$oDocument->getTrackbackCount()}}</em></h2>
		<p class="trackbackURL"><a href="{{$oDocument->getTrackbackUrl()}}" onclick="return false;">{{$oDocument->getTrackbackUrl()}}</a></p>
	</div>
	@if ($oDocument->getTrackbackCount())
		<ul class="fbList">
			@foreach ($oDocument->getTrackbacks() as $key => $val)
				<li class="fbItem" id="trackback_{{$val->trackback_srl}}">
					<div class="fbMeta">
						<h3 class="author"><a href="{{$val->url}}" title="{{htmlspecialchars($val->blog_name)}}">{{htmlspecialchars($val->blog_name)}}</a></h3>
						<p class="time">{{zdate($val->regdate, "Y.m.d H:i")}}</p>
					</div>
					<p class="rhymix_content xe_content"><strong>{{htmlspecialchars($val->title)}}</strong> {{$val->excerpt}}</p>
					@if ($grant->manager)
						<p class="action"><a href="{{getUrl('act','dispBoardDeleteTrackback','trackback_srl',$val->trackback_srl)}}" class="delete">{{$lang->cmd_delete}}</a></p>
					@endif
				</li>
			@endif
		</ul>
	@endif
</div>
<!-- /TRACKBACK -->
