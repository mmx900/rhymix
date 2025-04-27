<load target="board.default.css" />
<load target="board.default.js" type="body" />

{@
	if (isset($order_type) && $order_type == 'desc'):
		$order_type = 'asc';
	else:
		$order_type = 'desc';
	endif;

	$module_info->duration_new = intval($module_info->duration_new ?? 0);
	if (!$module_info->duration_new):
		$module_info->duration_new = 12;
	endif;

	$cate_list = [];
	$current_key = null;
	$category_list = $category_list ?? [];
	foreach ($category_list as $key => $val):
		if (!$val->depth):
			$cate_list[$key] = $val;
			$cate_list[$key]->children = array();
			$current_key = $key;
		elseif ($current_key):
			$cate_list[$current_key]->children[] = $val;
		endif;
	endforeach;
}

<div class="board">
	@if ($m && $module_info->mobile_header_text)
		{$module_info->mobile_header_text}
	@else
		{$module_info->header_text}
	@endif
	@if (!empty($module_info->title_image) || $grant->manager)
		<div class="board_header">
			@if ($module_info->title_image)
				<h2><a href="{getUrl('','mid',$mid)}"><img src="{$module_info->title_image}" alt="{$module_info->title_alt}" /></a></h2>
			@endif
			@if ($grant->manager)
				<a class="setup" href="{getUrl('act','dispBoardAdminBoardInfo')}" title="{$lang->cmd_setup}">{$lang->cmd_setup}</a>
			@endif
		</div>
	@endif
	@if ($module_info->use_category=='Y')
		<ul class="cTab">
			<li @class(['on' => empty($category)])><a href="{getUrl('category','','page','')}">{$lang->total}</a></li>
			@foreach ($cate_list as $key=>$val)
				<li @class(["on" => ($category ?? 0) == $val->category_srl])><a href="{getUrl('category',$val->category_srl,'document_srl','', 'page', '')}">{$val->title}<!--<em cond="$val->document_count">[{$val->document_count}]</em>--></a>
					@if (count($val->children))
						<ul>
							@foreach ($val->children as $idx => $item)
								<li @class(["on_" => $category==$item->category_srl])><a href="{getUrl('category',$item->category_srl,'document_srl','', 'page', '')}">{$item->title}<!--<em cond="$val->document_count">[{$item->document_count}]</em>--></a></li>
							@endforeach
						</ul>
					@endif
				</li>
			@endforeach
		</ul>
	@endif
