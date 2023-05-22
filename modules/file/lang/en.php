<?php
$lang->file = 'File';
$lang->file_management = 'File Management';
$lang->file_upload = 'File Upload';
$lang->file_upload_config = 'File Upload Settings';
$lang->file_download_config = 'File Download Settings';
$lang->file_other_config = 'Other Settings';
$lang->file_name = 'File Name';
$lang->file_size = 'File Size';
$lang->download_count = 'Number of Downloads';
$lang->status = 'Status';
$lang->is_valid = 'Valid';
$lang->is_stand_by = 'Stand by';
$lang->file_list = 'Attachment List';
$lang->allow_outlink = 'Allow External Link to Download URL';
$lang->allow_outlink_site = 'Allowed Websites';
$lang->allow_outlink_format = 'Allowed Formats';
$lang->allow_multimedia_direct_download = 'Allow Direct Link to Multimedia Attachments';
$lang->allowed_filesize = 'Maximum File Size';
$lang->allowed_filesize_exceeded = 'The file is too large. The maximum allowed filesize is %s.';
$lang->allowed_attach_size = 'Maximum Attachments';
$lang->allowed_filetypes = 'Allowed extentsions';
$lang->download_short_url = 'Use short URL';
$lang->inline_download_format = 'Open in current window';
$lang->inline_download_image = 'Image';
$lang->inline_download_audio = 'Audio';
$lang->inline_download_video = 'Video';
$lang->inline_download_text = 'Text (except HTML)';
$lang->inline_download_pdf = 'PDF';
$lang->file_save_changelog = 'Save changelog';
$lang->use_default_file_config = 'Use Default Settings';
$lang->about_use_default_file_config = 'Follow the default settings from the File module.';
$lang->about_download_short_url = 'Using short URLs can fix broken filenames in Android and some other platforms.<br />Short URLs must be enabled, and rewrite rules must be updated to the latest version if you use nginx.';
$lang->about_inline_download_format = 'Selected types of files will be opened in the current window instead of a download dialog when a user clicks the download link.';
$lang->enable_download_group = 'Downloadable Groups';
$lang->about_allow_outlink = 'Allow other websites to link directly to your download URLs.<br />Rhymix does not control links to image files that can be embedded directly in a document.<br />in order to block external links to such images, you may need to modify your web server configuration.';
$lang->about_allow_outlink_format = 'These file formats will always be allowed.<br />Please use a comma (,) to separate items: e.g. doc, zip, pdf';
$lang->about_allow_outlink_site = 'These referers will always be allowed.<br />Please enter one full address per line: e.g. https://www.rhymix.org/';
$lang->about_allow_multimedia_direct_download = 'Use directly accessible links for audio and video attachments.<br>This helps reduce server load, as the download of such large files will not go through PHP.<br>However, unprivileged users may be able to download audio and video files if the link is exposed.';
$lang->about_allowed_filesize = 'You can limit the size of each attached file.<br />Administrators are limited to this setting or the limit set in the <a href="%s" target="_blank">file module</a>, whichever is greater.';
$lang->about_allowed_attach_size = 'You can limit the total size of all attached files in one document.<br />Administrators are limited to this setting or the limit set in the <a href="%s" target="_blank">file module</a>, whichever is greater.';
$lang->about_allowed_filesize_global = 'This is the global limit on the size of each attachment.';
$lang->about_allowed_attach_size_global = 'This is the global limit on the combined size of all attachments in one document.';
$lang->about_allowed_size_limits = 'The file size will be limited to the value set in php.ini (%sB) in IE9 and below and older Android browsers.';
$lang->about_allowed_filetypes = 'Rhymix no longer uses the old *.* syntax. Simply list the extensions you wish to allow.<br />Please use a comma (,) to separate items: e.g. doc, zip, pdf';
$lang->about_save_changelog = 'Keep a log of new and deleted files in the database.';
$lang->cmd_delete_checked_file = 'Delete Selected Item(s)';
$lang->cmd_move_to_document = 'Move to Document';
$lang->cmd_download = 'Download';
$lang->msg_not_permitted_download = 'You do not have a permission to download.';
$lang->msg_file_cart_is_null = 'Please select a file(s) to delete.';
$lang->msg_checked_file_is_deleted = '%d attachment(s) was(were) deleted.';
$lang->msg_exceeds_limit_size = 'This file exceeds the attachment limit.';
$lang->msg_exceeds_max_image_size = 'This image is too large. Images must be no larger than %dx%dpx.';
$lang->msg_exceeds_max_image_width = 'This image is too large. The maximum permitted width is %dpx.';
$lang->msg_exceeds_max_image_height = 'This image is too large. The maximum permitted height is %dpx.';
$lang->msg_file_not_found = 'Could not find requested file.';
$lang->msg_file_key_expired = 'This download link is expired. Please initiate the download again.';
$lang->file_search_target_list['filename'] = 'File Name';
$lang->file_search_target_list['filesize_more'] = 'File Size(byte, more)';
$lang->file_search_target_list['filesize_mega_more'] = 'File Size(mbyte, more)';
$lang->file_search_target_list['filesize_less'] = 'File Size(byte, less)';
$lang->file_search_target_list['filesize_mega_less'] = 'File Size(Mb, less)';
$lang->file_search_target_list['download_count'] = 'Downloads(more)';
$lang->file_search_target_list['download_count_less'] = 'Downloads(less)';
$lang->file_search_target_list['user_id'] = 'User UD';
$lang->file_search_target_list['user_name'] = 'User Name';
$lang->file_search_target_list['nick_name'] = 'Nickname';
$lang->file_search_target_list['regdate'] = 'Registered Date';
$lang->file_search_target_list['ipaddress'] = 'IP Address';
$lang->file_search_target_list['isvalid'] = 'Status';
$lang->msg_not_allowed_outlink = 'It is not allowed to download files from sites other than this.';
$lang->msg_not_permitted_create = 'Failed to create a file or directory.';
$lang->msg_file_upload_error = 'An error has occurred during uploading.';
$lang->msg_upload_invalid_chunk = 'An error has occurred during chunked uploading.';
$lang->msg_32bit_max_2047mb = 'On 32-bit servers, the file size limit cannot exceed 2047MB.';
$lang->no_files = 'No Files';
$lang->file_manager = 'Manage selected files';
$lang->selected_file = 'Selected files';
$lang->use_image_default_file_config = 'Use Default Settings Of Image File';
$lang->about_use_image_default_file_config = 'Follow the default settings of image file from the File module.';
$lang->use_video_default_file_config = 'Use Default Settings Of Video File';
$lang->about_use_video_default_file_config = 'Follow the video settings of image file from the File module.';
$lang->image_autoconv = 'Convert Type';
$lang->about_image_autoconv = 'convert the type of uploaded images. You can fix images that often cause trouble or waste disk space into other types.<br />This also works for WebP images that incorrectly have the JPG extension.';
$lang->image_autoconv_bmp2jpg = 'BMP → JPG';
$lang->image_autoconv_png2jpg = 'PNG → JPG';
$lang->image_autoconv_webp2jpg = 'WebP → JPG';
$lang->max_image_size = 'Limit Image Size';
$lang->about_max_image_size = 'Limit the dimensions of uploaded images. Note that this is only indirectly related to file size.';
$lang->max_image_size_action_nothing = 'If exceeded, do nothing';
$lang->max_image_size_action_block = 'If exceeded, block upload';
$lang->max_image_size_action_resize = 'If exceeded, resize automatically';
$lang->max_image_size_same_format_Y = 'Maintain file format';
$lang->max_image_size_same_format_N = 'Convert to JPG';
$lang->max_image_size_admin = 'Also apply to administrator';
$lang->image_quality_adjustment = 'Image Quality';
$lang->about_image_quality_adjustment = 'adjust the quality of images that will is converted by other settings.<br />If set to more than 75% (Standard), the file size may be larger than the original.';
$lang->image_autorotate = 'Fix Image Rotation';
$lang->about_image_autorotate = 'correct images that are rotated by mobile devices.';
$lang->image_remove_exif_data = 'Remove EXIF';
$lang->about_image_remove_exif_data = 'remove EXIF data including camera, GPS information, and more in image file for privacy.<br />Even if this option is not used, EXIF ​​data may be removed when the image is converted by other settings.';
$lang->image_autoconv_gif2mp4 = 'Convert GIF to MP4';
$lang->about_image_autoconv_gif2mp4 = 'convert animated GIF images into MP4 videos to save storage and bandwidth.<br />This requires ffmpeg settings below. Videos may not play properly in older browsers.';
$lang->max_video_size = 'Limit Video Size';
$lang->about_max_video_size = 'Limit the dimensions of uploaded videos. Note that this is only indirectly related to file size.';
$lang->video_autoconv_any2mp4 = 'Convert to MP4';
$lang->about_video_autoconv_any2mp4 = 'Convert all other types of videos to MP4 format that can be played on the web.<br />Supported original formats vary by ffmpeg version and system environment, but usually include AVI and MOV.';
$lang->video_always_reencode = 'Always Reencode';
$lang->about_video_always_reencode = 'Reencode videos to a constant quality even if they do not meet one of the conditions above. This may help save disk space and traffic.';
$lang->video_thumbnail = 'Video Thumbnail';
$lang->about_video_thumbnail = 'extract a thumbnail image from uploaded video.';
$lang->video_mp4_gif_time = 'Play Like GIF';
$lang->about_video_mp4_gif_time = 'treat silent MP4 videos with duration less than the set time as GIF images, and play with auto and loop.';
$lang->ffmpeg_path = 'FFmpeg path';
$lang->ffprobe_path = 'FFprobe path';
$lang->msg_cannot_use_ffmpeg = 'FFmpeg and FFprobe must can be executed by PHP.';
$lang->msg_cannot_use_exif = 'PHP Exif module is required.';
