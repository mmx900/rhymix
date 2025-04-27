<load target="default.layout.css" />
@if ($layout_info->WEB_FONT == 'YES')
	<load target="default.layout.webfont.css" />
@endif
<load target="../../common/js/respond.min.js" targetie="lt IE 9" />
<load target="default.layout.js" type="body" />
<div class="container">
	<p class="skip"><a href="#content">{$lang->skip_to_content}</a></p>
	<header class="header">
		<h1>
			<a href="{geturl('')}" id="siteTitle">
				@if (!Context::getSiteTitle() && !$layout_info->LOGO_IMG && !$layout_info->LOGO_TEXT)
					<img src="siteTitle.png" alt="Rhymix">
				@endif
				@if (Context::getSiteTitle() && !$layout_info->LOGO_IMG && !$layout_info->LOGO_TEXT)
					{Context::getSiteTitle()}
				@endif
				@if ($layout_info->LOGO_IMG)
					<img src="{$layout_info->LOGO_IMG}" alt="{$layout_info->LOGO_TEXT}">
				@endif
				@if (!$layout_info->LOGO_IMG && $layout_info->LOGO_TEXT)
					{$layout_info->LOGO_TEXT}
				@endif
			</a>
		</h1>
		<div class="side">
			<!-- ACCOUNT -->
			<img widget="login_info" skin="default" />
			<!-- /ACCOUNT -->
			<!-- SEARCH -->
			<form action="{getUrl()}" method="get" class="search" no-error-return-url="true">
				<input type="hidden" name="mid" value="{$mid}" />
				<input type="hidden" name="act" value="IS" />
				<input type="text" name="is_keyword" value="{$is_keyword}" required placeholder="{$lang->cmd_search}" title="{$lang->cmd_search}" />
				<input type="submit" value="{$lang->cmd_search}" />
			</form>
			<!-- /SEARCH -->
		</div>
		<!-- GNB -->
		<nav class="gnb" id="gnb">
			<ul>
				@foreach ($GNB->list as $key1 => $val1)
					<li @class(['active' => $val1['selected']])>
						<a href="{$val1['href']}" class="{$val1['class']}"|cond="!empty($val1['class'])" target="_blank"|cond="$val1['open_window']=='Y'">{$val1['link']}</a>
						@if ($val1['list'])
							<ul>
								@foreach ($val1['list'] as $key2 => $val2)
									<li @class(['active' => $val2['selected']])>
										<a href="{$val2['href']}" class="{$val2['class']}"|cond="!empty($val2['class'])" target="_blank"|cond="$val2['open_window']=='Y'">{$val2['link']}</a>
									</li>
								@endforeach
							</ul>
						@endif
					</li>
				@endforeach
			</ul>
		</nav>
		<!-- /GNB -->
	</header>
	<!-- VISUAL | DEFAULT -->
	@if (!$layout_info->VISUAL_IMAGE_1 && !$layout_info->VISUAL_IMAGE_2 && !$layout_info->VISUAL_IMAGE_3 && $layout_info->VISUAL_USE=='YES')
		<div @class([
			"visual main" => $layout_info->LAYOUT_TYPE=='MAIN_PAGE',
			"visual sub" => $layout_info->LAYOUT_TYPE=='SUB_PAGE'
		])>
			<div class="list">
				@if ($layout_info->LAYOUT_TYPE=='MAIN_PAGE')
					<a href="{geturl('','module','admin','act','dispAdminConfigGeneral')}" class="item i1">
						<img src="visual.main.1.jpg" alt="" />
						<p>Click, to change<br> the site title.</p>
					</a>
				@endif
				@if ($layout_info->LAYOUT_TYPE=='MAIN_PAGE')
					<a href="{geturl('','module','admin','act','dispMenuAdminSiteMap')}" class="item i2">
						<img src="visual.main.2.jpg" alt="" />
						<p>Click, to change<br> the site navigation.</p>
					</a>
				@endif
				@if ($layout_info->LAYOUT_TYPE=='MAIN_PAGE')
					<a href="{geturl('','module','admin','act','dispLayoutAdminInstanceList','layout','default')}" class="item i3">
						<img src="visual.main.3.jpg" alt="" />
						<p>Click, to change<br> the site visual image.</p>
					</a>
				@endif
				@if ($layout_info->LAYOUT_TYPE=='SUB_PAGE')
					<a href="{geturl('','module','admin','act','dispLayoutAdminInstanceList','layout','default')}" class="item i1">
						<img src="visual.sub.jpg" alt="" />
						<p>Click, to change the site visual image.</p>
					</a>
				@endif
			</div>
			<button type="button" class="prev" title="Prev"><i></i></button>
			<button type="button" class="next" title="Next"><i></i></button>
		</div>
	@endif
	<!-- VISUAL | USER DEFINE -->
	@if (($layout_info->VISUAL_IMAGE_1 || $layout_info->VISUAL_IMAGE_2 || $layout_info->VISUAL_IMAGE_3) && $layout_info->VISUAL_USE=='YES')
		<div @class([
			"visual main" => $layout_info->LAYOUT_TYPE=='MAIN_PAGE',
			"visual sub" => $layout_info->LAYOUT_TYPE=='SUB_PAGE'
		])>
			<div class="list">
				@if ($layout_info->VISUAL_IMAGE_1)
					<a href="{$layout_info->VISUAL_LINK_1}" class="item i1">
						<img src="{$layout_info->VISUAL_IMAGE_1}" alt="" />
						<p>{$layout_info->VISUAL_TEXT_1}</p>
					</a>
				@endif
				@if ($layout_info->VISUAL_IMAGE_2)
					<a href="{$layout_info->VISUAL_LINK_2}" class="item i2">
						<img src="{$layout_info->VISUAL_IMAGE_2}" alt="" />
						<p>{$layout_info->VISUAL_TEXT_2}</p>
					</a>
				@endif
				@if ($layout_info->VISUAL_IMAGE_3)
					<a href="{$layout_info->VISUAL_LINK_3}" class="item i3">
						<img src="{$layout_info->VISUAL_IMAGE_3}" alt="" />
						<p>{$layout_info->VISUAL_TEXT_3}</p>
					</a>
				@endif
			</div>
			<button type="button" class="prev" title="Prev"><i></i></button>
			<button type="button" class="next" title="Next"><i></i></button>
		</div>
	@endif
	<!-- /VISUAL -->
	<div @class([
		"body main" => $layout_info->LAYOUT_TYPE=='MAIN_PAGE',
		"body sub" => $layout_info->LAYOUT_TYPE=='SUB_PAGE'
	])>
		<!-- LNB -->
		@if ($layout_info->LAYOUT_TYPE == 'SUB_PAGE')
			<nav class="lnb">
				@if ($val1['selected'])
					@foreach ($GNB->list as $key1 => $val1)
						<h1>
							<a href="{$val1['href']}" class="{$val1['class']}"|cond="!empty($val1['class'])" target="_blank"|cond="$val1['open_window']=='Y'">{$val1['link']}</a>
						</h1>
					@endforeach
				@endif
				@if ($val1['selected'] && $val1['list'])
					@foreach ($GNB->list as $key1 =>$val1)
						<ul>
							@foreach ($val1['list'] as $key2 => $val2)
								<li @class(['active' => $val2['selected']])>
									<a href="{$val2['href']}" class="{$val2['class']}"|cond="!empty($val2['class'])" target="_blank"|cond="$val2['open_window']=='Y'">{$val2['link']}</a>
									@if ($val2['list'])
										<ul>
											@foreach ($val2['list'] as $key3 =>$val3)
												<li @class(['active' => $val3['selected']])>
													<a href="{$val3['href']}" class="{$val3['class']}"|cond="!empty($val3['class'])" target="_blank"|cond="$val3['open_window']=='Y'">{$val3['link']}</a>
												</li>
											@endforeach
										</ul>
									@endif
								</li>
							@endforeach
						</ul>
					@endforeach
				@endif
			</nav>
		@endif
		<!-- /LNB -->
		<!-- CONTENT -->
		<div class="content" id="content">
			{$content|noescape}
		</div>
		<!-- /CONTENT -->
	</div>
</div>
<footer class="footer">
	@if (!$layout_info->FOOTER)
		<p>Powered by <a href="https://rhymix.org">Rhymix</a></p>
	@endif
	@if ($layout_info->FOOTER)
		<p>{$layout_info->FOOTER}</p>
	@endif
</footer>
