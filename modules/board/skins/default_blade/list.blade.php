<include target="_header.blade.php" />
@if ($oDocument->isExists())
	<include target="_read.blade.php" />
@endif
@if (isset($list_config))
	<div class="board_list" id="board_list">
		<table width="100%" border="1" cellspacing="0" summary="List of Articles">
			<thead>
				<!-- LIST HEADER -->
				<tr>
					@foreach ($list_config as $key=>$val)
						@if ($val->type=='no' && $val->idx==-1)
							<th scope="col"><span>{{$lang->no}}</span></th>
						@endif
						@if ($val->type=='module_title' && $val->idx==-1)
							<th scope="col"><span>{{$lang->module_title}}</span></th>
						@endif
						@if ($val->type=='title' && $val->idx==-1)
							<th scope="col" class="title"><span>{{$lang->title}}</span></th>
						@endif
						@if ($val->type=='nick_name' && $val->idx==-1)
							<th scope="col"><span>{{$lang->writer}}</span></th>
						@endif
						@if ($val->type=='user_id' && $val->idx==-1)
							<th scope="col"><span>{{$lang->user_id}}</span></th>
						@endif
						@if ($val->type=='user_name' && $val->idx==-1)
							<th scope="col"><span>{{$lang->user_name}}</span></th>
						@endif
						@if ($val->type=='regdate' && $val->idx==-1)
							<th scope="col"><span><a href="{{getUrl('sort_index','regdate','order_type',$order_type)}}">{{$lang->date}}</a></span></th>
						@endif
						@if ($val->type=='last_update' && $val->idx==-1)
							<th scope="col><span><a href="{{getUrl('sort_index','update_order','order_type',$order_type)}}">{{$lang->last_update}}</a></span></th>
						@endif
						@if ($val->type=='last_post' && $val->idx==-1)
							<th scope="col"><span><a href="{{getUrl('sort_index','update_order','order_type',$order_type)}}">{{$lang->last_post}}</a></span></th>
						@endif
						@if ($val->type=='readed_count' && $val->idx==-1)
							<th scope="col"><span><a href="{{getUrl('sort_index','readed_count','order_type',$order_type)}}">{{$lang->readed_count}}</a></span></th>
						@endif
						@if ($val->type=='voted_count' && $val->idx==-1)
							<th scope="col"><span><a href="{{getUrl('sort_index','voted_count','order_type',$order_type)}}">{{$lang->voted_count}}</a></span></th>
						@endif
						@if ($val->type=='blamed_count' && $val->idx==-1)
							<th scope="col"><span><a href="{{getUrl('sort_index','blamed_count','order_type',$order_type)}}">{{$lang->blamed_count}}</a></span></th>
						@endif
						@if ($val->idx!=-1)
							<th scope="col"><span><a href="{{getUrl('sort_index', $val->eid, 'order_type', $order_type)}}">{{$val->name}}</a></span></th>
						@endif
					@endforeach
					@if ($grant->manager)
						<th scope="col" style="width:44px"><span><input type="checkbox" onclick="XE.checkboxToggleAll({ doClick:true });" class="iCheck" title="Check All" /></span></th>
					@endif
				</tr>
				<!-- /LIST HEADER -->
			</thead>
			@if (!$document_list && !$notice_list)
				<tbody>
					<tr>
						<td colspan="{{ !$grant->manager ? count($list_config) : count($list_config) + 1 }}">
							<p style="text-align:center">{{$lang->no_documents}}</p>
						</td>
					</tr>
				</tbody>
			@endif
			@if ($document_list || $notice_list)
				<tbody>
					<!-- NOTICE -->
					@foreach ($notice_list as $no=>$document)
						<tr class="notice">
							@foreach ($list_config as $key => $val)
								@if ($val->type=='no' && $val->idx==-1)
									<td class="notice">
										@if ($document_srl==$document->document_srl)
											&raquo;
										@endif
										@if ($document_srl!=$document->document_srl)
											{{$lang->notice}}
										@endif
									</td>
								@endif
								@if ($val->type=='module_title' && $val->idx==-1)
									<td class="module_title">
										<a href="{{getUrl('', 'mid', $document->get('mid'))}}">{{$document->get('module_title')}}</a>
									</td>
								@endif
								@if ($val->type=='title' && $val->idx==-1)
									<td class="title">
										<a href="{{getUrl('document_srl',$document->document_srl, 'listStyle', $listStyle, 'cpage','')}}">
											{{$document->getTitle()}}
										</a>
										@if ($document->getCommentCount())
											<a href="{{getUrl('document_srl', $document->document_srl)}}#comment" class="replyNum" title="Replies">
												[{{$document->getCommentCount()}}]
											</a>
										@endif
										@if ($document->getTrackbackCount())
											<a href="{{getUrl('document_srl', $document->document_srl)}}#trackback" class="trackbackNum" title="Trackbacks">
												[{{$document->getTrackbackCount()}}]
											</a>
										@endif
									</td>
								@endif
								@if ($val->type=='nick_name' && $val->idx==-1)
									<td class="author"><a href="#popup_menu_area" class="member_{{$document->get('member_srl')}}" onclick="return false">{{$document->getNickName()}}</a></td>
								@endif
								@if ($val->type=='user_id' && $val->idx==-1)
									<td class="author">{{$document->getUserID()}}</td>
								@endif
								@if ($val->type=='user_name' && $val->idx==-1)
									<td class="author">{{$document->getUserName()}}</td>
								@endif
								@if ($val->type=='regdate' && $val->idx==-1)
									<td class="time">{{$document->getRegdate('Y.m.d')}}</td>
								@endif
								@if ($val->type=='last_update' && $val->idx==-1)
									<td class="time">{{zdate($document->get('last_update'),'Y.m.d')}}</td>
								@endif
								@if ($val->type=='last_post' && $val->idx==-1)
									<td class="lastReply">
										@if ((int)($document->get('comment_count'))>0)
											<a href="{{$document->getUrl()}}#comment" title="Last Reply">
												{{zdate($document->get('last_update'),'Y.m.d')}}
											</a>
											@if ($document->getLastUpdater())
												<span>
													<sub>by</sub>
													{{$document->getLastUpdater()}}
												</span>
											@endif
										@endif
										@if ((int)($document->get('comment_count'))==0)
											&nbsp;
										@endif
									</td>
								@endif
								@if ($val->type=='readed_count' && $val->idx==-1)
									<td class="readNum">{{$document->get('readed_count')>0?$document->get('readed_count'):'0'}}</td>
								@endif
								@if ($val->type=='voted_count' && $val->idx==-1)
									<td class="voteNum">{{$document->get('voted_count')!=0?$document->get('voted_count'):'0'}}</td>
								@endif
								@if ($val->type=='blamed_count' && $val->idx==-1)
									<td class="voteNum">{{$document->get('blamed_count')!=0?$document->get('blamed_count'):'0'}}</td>
								@endif
								@if ($val->idx!=-1)
									<td>{{$document->getExtraValueHTML($val->idx)}}&nbsp;</td>
								@endif
							@endforeach
							@if ($grant->manager)
									<td class="check"><input type="checkbox" name="cart" value="{{$document->document_srl}}" class="iCheck" title="Check This Article" onclick="doAddDocumentCart(this)" @checked($document->isCarted()) /></td>
							@endif
						</tr>
					@endforeach
					<!-- /NOTICE -->
					<!-- LIST -->
					@foreach ($document_list as $no => $document)
						<tr>
							@foreach ($list_config as $key => $val)
								@if ($val->type=='no' && $val->idx==-1)
									<td class="no">
										@if ($document_srl==$document->document_srl)
											&raquo;
										@endif
										@if ($document_srl!=$document->document_srl)
											{{$no}}
										@endif
									</td>
								@endif
							    @if ($val->type=='module_title' && $val->idx==-1)
									<td class="module_title">
										<a href="{{getUrl('', 'mid', $document->get('mid'))}}">{{$document->get('module_title')}}</a>
									</td>
								@endif
								@if ($val->type=='title' && $val->idx==-1)
									<td class="title">
										<a href="{{getUrl('document_srl',$document->document_srl, 'listStyle', $listStyle, 'cpage','')}}">{{$document->getTitle()}}</a>
										@if ($document->getCommentCount())
											<a href="{{getUrl('document_srl', $document->document_srl)}}#comment" class="replyNum" title="Replies">[{{$document->getCommentCount()}}]</a>
										@endif
										@if ($document->getTrackbackCount())
											<a href="{{getUrl('document_srl', $document->document_srl)}}#trackback" class="trackbackNum" title="Trackbacks">[{{$document->getTrackbackCount()}}]</a>
										@endif
										{{$document->printExtraImages(60*60*$module_info->duration_new)|noescape}}
									</td>
								@endif
								@if ($val->type=='nick_name' && $val->idx==-1)
									<td class="author"><a href="#popup_menu_area" class="member_{{$document->get('member_srl')}}" onclick="return false">{{$document->getNickName()}}</a></td>
								@endif
								@if ($val->type=='user_id' && $val->idx==-1)
									<td class="author">{{$document->getUserID()}}</td>
								@endif
								@if ($val->type=='user_name' && $val->idx==-1)
									<td class="author">{{$document->getUserName()}}</td>
								@endif
								@if ($val->type=='regdate' && $val->idx==-1)
									<td class="time">{{$document->getRegdate('Y.m.d')}}</td>
								@endif
								@if ($val->type=='last_update' && $val->idx==-1)
									<td class="time">{{zdate($document->get('last_update'),'Y.m.d')}}</td>
								@endif
								@if ($val->type=='last_post' && $val->idx==-1)
									<td class="lastReply">
										@if ((int)($document->get('comment_count'))>0)
											<a href="{{$document->getUrl()}}#comment" title="Last Reply">
												{{zdate($document->get('last_update'),'Y.m.d')}}
											</a>
											@if ($document->getLastUpdater())
												<span>
													<sub>by</sub>
													{{$document->getLastUpdater()}}
												</span>
											@endif
										@endif
										@if ((int)($document->get('comment_count'))==0)
											&nbsp;
										@endif
									</td>
								@endif
								@if ($val->type=='readed_count' && $val->idx==-1)
									<td class="readNum">{{$document->get('readed_count')>0?$document->get('readed_count'):'0'}}</td>
								@endif
								@if ($val->type=='voted_count' && $val->idx==-1)
									<td class="voteNum">{{$document->get('voted_count')!=0?$document->get('voted_count'):'0'}}</td>
								@endif
								@if ($val->type=='blamed_count' && $val->idx==-1)
									<td class="voteNum">{{$document->get('blamed_count')!=0?$document->get('blamed_count'):'0'}}</td>
								@endif
								@if ($val->idx!=-1)
									<td>{{$document->getExtraValueHTML($val->idx)}}&nbsp;</td>
								@endif
							@endforeach
							@if ($grant->manager)
								<td class="check"><input type="checkbox" name="cart" value="{{$document->document_srl}}" class="iCheck" title="Check This Article" onclick="doAddDocumentCart(this)" @checked($document->isCarted()) /></td>
							@endif
						</tr>
					@endforeach
					<!-- /LIST -->
				</tbody>
			@endif
		</table>
	</div>
@endif
<div class="list_footer">
	@if ($document_list || $notice_list)
		<div class="pagination">
			<a href="{{getUrl('page','','document_srl','','division',$division,'last_division',$last_division)}}" class="direction prev"><span></span><span></span> {{$lang->first_page}}</a>
			@while ($page_no = $page_navigation->getNextPage())
				@if ($page==$page_no)
					<strong>{{$page_no}}</strong>
				@endif
				@if ($page!=$page_no)
					<a href="{{getUrl('page',$page_no,'document_srl','','division',$division,'last_division',$last_division)}}">{{$page_no}}</a>
				@endif
			@endwhile
			<a href="{{getUrl('page',$page_navigation->last_page,'document_srl','','division',$division,'last_division',$last_division)}}" class="direction next">{{$lang->last_page}} <span></span><span></span></a>
		</div>
	@endif
	<div class="btnArea">
		<a href="{{getUrl('', 'mid', $mid, 'act', 'dispBoardWrite', 'category', $category ?? null)}}" class="btn">{{$lang->cmd_write}}</a>
		@if ($grant->manager)
			<a href="{{getUrl('','mid',$mid,'act','dispDocumentManageDocument')}}" class="btn" onclick="popopen(this.href,'manageDocument'); return false;">{{$lang->cmd_manage_document}}</a>
		@endif
	</div>
	<button type="button" class="bsToggle" title="{{$lang->cmd_search}}">{{$lang->cmd_search}}</button>
	@if ($grant->view)
		<form action="{{getUrl()}}" method="get" id="board_search" class="board_search" rx-autoform="false">
			<input type="hidden" name="mid" value="{{$mid}}" />
			<input type="hidden" name="category" value="{{$category}}" />
			<input type="text" name="search_keyword" value="{escape($search_keyword, false)}" title="{{$lang->cmd_search}}" class="iText" />
			<select name="search_target">
				@foreach ($search_option as $key=>$val)
					<option value="{{$key}}" @selected($search_target==$key)>{{$val}}</option>
				@endforeach
			</select>
			<button type="submit" class="btn">{{$lang->cmd_search}}</button>
			@if ($last_division)
			<a href="{{getUrl('page',1,'document_srl','','division',$last_division,'last_division','')}}" class="btn">{{$lang->cmd_search_next}}</a>
			@endif
		</form>
	@endif
	<a href="{{getUrl('', 'mid', $mid, 'act', 'dispBoardTagList')}}" class="tagSearch" title="{{$lang->tag}}">{{$lang->tag}}</a>
</div>
<include target="_footer.blade.php" />
