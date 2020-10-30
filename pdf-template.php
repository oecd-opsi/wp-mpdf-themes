<?php
	//Standard Plan Template

	global $post;
	global $pdf_output;
	global $pdf_header;
	global $pdf_footer;

	global $pdf_template_pdfpage;
	global $pdf_template_pdfpage_page;
	global $pdf_template_pdfdoc;

	global $pdf_html_header;
	global $pdf_html_footer;

	global $pdf_orientation;

	//Set a pdf template. if both are set the pdfdoc is used. (You didn't need a pdf template)
	$pdf_template_pdfpage 		= ''; //The filename off the pdf file (you need this for a page template)
	$pdf_template_pdfpage_page 	= 1;  //The page off this page (you need this for a page template)

	$pdf_template_pdfdoc  		= ''; //The filename off the complete pdf document (you need only this for a document template)

	$pdf_html_header 			= false; //If this is ture you can write instead of the array a html string on the var $pdf_header
	$pdf_html_footer 			= false; //If this is ture you can write instead of the array a html string on the var $pdf_footer

	$pdf_orientation = 'L';

	global $pdf_margin_left;
	global $pdf_margin_right;
	global $pdf_margin_top;
	global $pdf_margin_bottom;
	global $pdf_margin_header;
	global $pdf_margin_footer;

	$pdf_margin_left = 0;
	$pdf_margin_right = 0;
	$pdf_margin_top = 0;
	$pdf_margin_bottom = 0;
	$pdf_margin_header = 0;
	$pdf_margin_footer = 0;

	$fields = get_field_objects( $post->ID );

  //* Organisation
  $general_questions = get_field('general_questions');
  $organisation = $general_questions['organisation'];

  //* Name
  $name = get_the_author_meta( 'display_name', $post->post_author );


  //* Date
  $submission_date = get_field( 'submission_date' );

  $scores = pat_score($post->ID);

	// Create images
	// Define where to put images
	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir['basedir'].'/pat-temp';
	if( !file_exists( $upload_path )) {
		$dir = mkdir( $upload_path );
	}

	// Diamond 1
	$diamond_1 = '
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="803" height="445" viewBox="0 0 803 445"><defs><style>.a{fill:none;stroke:#fff;stroke-width:3px;}.b{fill:'. $scores['enh_color'] .';}.c{fill:'. $scores['mis_color'] .';}.d{fill:'. $scores['ada_color'] .';}.e{fill:'. $scores['ant_color'] .';}.f{fill:#605f5f;font-size:12px;}.f,.g{font-family:Roboto-Medium, Roboto, lato, sans-serif;font-weight:500;}.g{fill:#fff;font-size:33px;}.h{filter:url(#i);}.i{filter:url(#g);}.j{filter:url(#e);}.k{filter:url(#c);}.l{filter:url(#a);}</style><filter id="a" x="125.265" y="25.211" width="572.267" height="381.245" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="3" result="b"/><feFlood flood-opacity="0.161"/><feComposite operator="in" in2="b"/><feComposite in="SourceGraphic"/></filter><filter id="c" x="186.614" y="149.628" width="214.802" height="135.775" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="1.5" result="d"/><feFlood flood-opacity="0.349"/><feComposite operator="in" in2="d"/><feComposite in="SourceGraphic"/></filter><filter id="e" x="305.324" y="71.092" width="214.802" height="135.775" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="1.5" result="f"/><feFlood flood-opacity="0.349"/><feComposite operator="in" in2="f"/><feComposite in="SourceGraphic"/></filter><filter id="g" x="305.324" y="227.27" width="214.802" height="135.775" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="1.5" result="h"/><feFlood flood-opacity="0.349"/><feComposite operator="in" in2="h"/><feComposite in="SourceGraphic"/></filter><filter id="i" x="424.927" y="149.628" width="214.802" height="135.775" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="1.5" result="j"/><feFlood flood-opacity="0.349"/><feComposite operator="in" in2="j"/><feComposite in="SourceGraphic"/></filter></defs><g transform="translate(-490 -1096.295)"><g class="l" transform="matrix(1, 0, 0, 1, 490, 1096.29)"><path class="a" d="M2580.007,3511.292l274.127-178.347L3128.8,3511.292,2854.135,3692.6Z" transform="translate(-2443.01 -3299.95)"/></g><g class="k" transform="matrix(1, 0, 0, 1, 490, 1096.29)"><path class="b" d="M749.043,1424.834l-102.9,62.941-102.9-62.941L646.142,1361Z" transform="translate(-352.13 -1209.87)"/></g><g transform="translate(799.824 1168.887)"><g class="j" transform="matrix(1, 0, 0, 1, -309.82, -72.59)"><path class="c" d="M871.043,1347.834l-102.9,62.941-102.9-62.941L768.142,1284Z" transform="translate(-355.42 -1211.41)"/></g></g><g class="i" transform="matrix(1, 0, 0, 1, 490, 1096.29)"><path class="d" d="M871.043,1500.834l-102.9,62.941-102.9-62.941L768.142,1437Z" transform="translate(-355.42 -1208.23)"/></g><g class="h" transform="matrix(1, 0, 0, 1, 490, 1096.29)"><path class="e" d="M994.043,1424.834l-102.9,62.941-102.9-62.941L891.142,1361Z" transform="translate(-358.81 -1209.87)"/></g><text class="f" transform="translate(1245 1308.295)"><tspan x="-39.574" y="0">UNCERTAINTY</tspan><tspan x="-47.317" y="14">Exploring/Radical</tspan></text><text class="f" transform="translate(897.224 1524.295)"><tspan x="-35.707" y="0">UNDIRECTED</tspan><tspan x="-62.745" y="14">Responding/Bottom Up</tspan></text><text class="f" transform="translate(907.224 1107.295)"><tspan x="-27.536" y="0">DIRECTED</tspan><tspan x="-53.484" y="14">Shaping / Top Down</tspan></text><text class="f" transform="translate(553 1301.295)"><tspan x="-31.403" y="0">CERTAINTY</tspan><tspan x="-62.396" y="14">Exploiting/ Incremental</tspan></text><text class="g" transform="translate(902.528 1240)"><tspan x="-30.873" y="0">'. $scores['mis_percentage'] .'%</tspan></text><text class="g" transform="translate(902.528 1399)"><tspan x="-30.873" y="0">'. $scores['ada_percentage'] .'%</tspan></text><text class="g" transform="translate(1021.528 1322)"><tspan x="-30.873" y="0">'. $scores['ant_percentage'] .'%</tspan></text><text class="g" transform="translate(783.528 1316)"><tspan x="-30.873" y="0">'. $scores['enh_percentage'] .'%</tspan></text></g></svg>
	';
	$d1_file_input_path = $upload_path.'/diamond1-'.$post->ID.'.svg';
	$d1_file_output_path = $upload_path.'/diamond1-'.$post->ID.'.png';
	$handle_d1 = file_put_contents( $d1_file_input_path, $diamond_1 );
	exec("inkscape $d1_file_input_path --export-png $d1_file_output_path");
	$d1_file_output_url = $upload_dir['baseurl'].'/pat-temp/diamond1-'.$post->ID.'.png';

	// Diamond 2
	$diamond_2 = '
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="500" height="296" viewBox="0 0 548.793 343.681"> <defs> <style>.enh-a{fill: #e6e8f0;}.enh-b{fill: '. $scores['enh_color'] .';}.enh-c, .enh-e, .enh-f{opacity: 0.201;}.enh-d{fill: '. $scores['mis_color'] .';}.enh-e{fill: '. $scores['ada_color'] .';}.enh-f{fill: '. $scores['ant_color'] .';}.enh-g, .enh-h{fill: #fff; font-family: Roboto-Medium, Roboto, lato, sans-serif; font-weight: 500;}.enh-g{font-size: 20px;}.enh-h{font-size: 33px;}.enh-i{filter: url(#enh-g);}.enh-j{filter: url(#enh-e);}.enh-k{filter: url(#enh-c);}.enh-l{filter: url(#enh-a);}</style> <filter id="enh-a" x="49.614" y="105.65" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="b"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="b"/> <feComposite in="SourceGraphic"/> </filter> <filter id="enh-c" x="168.324" y="27.115" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="d"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="d"/> <feComposite in="SourceGraphic"/> </filter> <filter id="enh-e" x="168.324" y="183.293" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="f"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="f"/> <feComposite in="SourceGraphic"/> </filter> <filter id="enh-g" x="287.927" y="105.65" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="h"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="h"/> <feComposite in="SourceGraphic"/> </filter> </defs> <g transform="translate(-627 -1980.272)"> <path class="enh-a" d="M2580.007,3503.369l274.127-170.424L3128.8,3503.369l-274.666,173.257Z" transform="translate(-1953.007 -1352.673)"/> <g class="enh-l" transform="matrix(1, 0, 0, 1, 627, 1980.27)"> <path class="enh-b" d="M749.043,1424.834l-102.9,62.941-102.9-62.941L646.142,1361Z" transform="translate(-489.13 -1253.85)"/> </g> <g class="enh-c" transform="translate(799.824 2008.887)"> <g class="enh-k" transform="matrix(1, 0, 0, 1, -172.82, -28.62)"> <path class="enh-d" d="M871.043,1347.834l-102.9,62.941-102.9-62.941L768.142,1284Z" transform="translate(-492.42 -1255.38)"/> </g> </g> <g class="enh-j" transform="matrix(1, 0, 0, 1, 627, 1980.27)"> <path class="enh-e" d="M871.043,1500.834l-102.9,62.941-102.9-62.941L768.142,1437Z" transform="translate(-492.42 -1252.21)"/> </g> <g class="enh-i" transform="matrix(1, 0, 0, 1, 627, 1980.27)"> <path class="enh-f" d="M994.043,1424.834l-102.9,62.941-102.9-62.941L891.142,1361Z" transform="translate(-495.81 -1253.85)"/> </g><text class="enh-g" transform="translate(902.528 2080)"> <tspan x="-40.474" y="0">MISSION</tspan> </text><text class="enh-g" transform="translate(898.528 2235)"> <tspan x="-47.148" y="0">ADAPTIVE</tspan> </text><text class="enh-g" transform="translate(1022.528 2155)"> <tspan x="-68.384" y="0">ANTICIPATORY</tspan> </text><text class="enh-h" transform="translate(790 2162)"> <tspan x="-30.873" y="0">'. $scores['enh_percentage'] .'%</tspan> </text> </g></svg>
	';
	$d2_file_input_path = $upload_path.'/diamond2-'.$post->ID.'.svg';
	$d2_file_output_path = $upload_path.'/diamond2-'.$post->ID.'.png';
	$handle_d2 = file_put_contents( $d2_file_input_path, $diamond_2 );
	exec("inkscape $d2_file_input_path --export-png $d2_file_output_path");
	$d2_file_output_url = $upload_dir['baseurl'].'/pat-temp/diamond2-'.$post->ID.'.png';

	// Diamond 3
	$diamond_3 = '
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="500" height="296" viewBox="0 0 548.793 343.681"> <defs> <style>.mis-a{fill: #e6e8f0;}.mis-b{fill: '. $scores['enh_color'] .'; opacity: 0.2;}.mis-c{fill: '. $scores['mis_color'] .';}.mis-d{fill: '. $scores['ada_color'] .';}.mis-d, .mis-e{opacity: 0.201;}.mis-e{fill: '. $scores['ant_color'] .';}.mis-f, .mis-g{fill: #fff; font-family: Roboto-Medium, Roboto, lato, sans-serif; font-weight: 500;}.mis-f{font-size: 20px;}.mis-g{font-size: 33px;}.mis-h{filter: url(#mis-g);}.mis-i{filter: url(#mis-e);}.mis-j{filter: url(#mis-c);}.mis-k{filter: url(#mis-a);}</style> <filter id="mis-a" x="49.614" y="105.65" width="214.801" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="b"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="b"/> <feComposite in="SourceGraphic"/> </filter> <filter id="mis-c" x="168.324" y="27.115" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="d"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="d"/> <feComposite in="SourceGraphic"/> </filter> <filter id="mis-e" x="168.324" y="183.293" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="f"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="f"/> <feComposite in="SourceGraphic"/> </filter> <filter id="mis-g" x="287.927" y="105.65" width="214.801" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="h"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="h"/> <feComposite in="SourceGraphic"/> </filter> </defs> <g transform="translate(-5165 -1827.272)"> <path class="mis-a" d="M2580.007,3503.369l274.127-170.424L3128.8,3503.369l-274.666,173.257Z" transform="translate(2584.993 -1505.673)"/> <g class="mis-k" transform="matrix(1, 0, 0, 1, 5165, 1827.27)"> <path class="mis-b" d="M749.043,1424.834l-102.9,62.941-102.9-62.941L646.142,1361Z" transform="translate(-489.13 -1253.85)"/> </g> <g transform="translate(5337.824 1855.887)"> <g class="mis-j" transform="matrix(1, 0, 0, 1, -172.82, -28.62)"> <path class="mis-c" d="M871.043,1347.834l-102.9,62.941-102.9-62.941L768.142,1284Z" transform="translate(-492.42 -1255.38)"/> </g> </g> <g class="mis-i" transform="matrix(1, 0, 0, 1, 5165, 1827.27)"> <path class="mis-d" d="M871.043,1500.834l-102.9,62.941-102.9-62.941L768.142,1437Z" transform="translate(-492.42 -1252.21)"/> </g> <g class="mis-h" transform="matrix(1, 0, 0, 1, 5165, 1827.27)"> <path class="mis-e" d="M994.043,1424.834l-102.9,62.941-102.9-62.941L891.142,1361Z" transform="translate(-495.81 -1253.85)"/> </g><text class="mis-f" transform="translate(5321.528 2002)"> <tspan x="-73.32" y="0">ENHANCEMENT</tspan> </text><text class="mis-f" transform="translate(5436.528 2082)"> <tspan x="-47.148" y="0">ADAPTIVE</tspan> </text><text class="mis-f" transform="translate(5560.528 2002)"> <tspan x="-68.384" y="0">ANTICIPATORY</tspan> </text><text class="mis-g" transform="translate(5441 1931)"> <tspan x="-30.873" y="0">'. $scores['mis_percentage'] .'%</tspan> </text> </g></svg>
	';
	$d3_file_input_path = $upload_path.'/diamond3-'.$post->ID.'.svg';
	$d3_file_output_path = $upload_path.'/diamond3-'.$post->ID.'.png';
	$handle_d3 = file_put_contents( $d3_file_input_path, $diamond_3 );
	exec("inkscape $d3_file_input_path --export-png $d3_file_output_path");
	$d3_file_output_url = $upload_dir['baseurl'].'/pat-temp/diamond3-'.$post->ID.'.png';

	// Diamond 4
	$diamond_4 = '
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="500" height="296" viewBox="0 0 548.793 343.681"> <defs> <style>.ada-a{fill: #e6e8f0;}.ada-b{fill: '. $scores['enh_color'] .';}.ada-b, .ada-c, .ada-f{opacity: 0.2;}.ada-d{fill: '. $scores['mis_color'] .';}.ada-e{fill: '. $scores['ada_color'] .';}.ada-f{fill: '. $scores['ant_color'] .';}.ada-g, .ada-h{fill: #fff; font-family: Roboto-Medium, Roboto, lato, sans-serif; font-weight: 500;}.ada-g{font-size: 20px;}.ada-h{font-size: 33px;}.ada-i{filter: url(#ada-g);}.ada-j{filter: url(#ada-e);}.ada-k{filter: url(#ada-c);}.ada-l{filter: url(#ada-a);}</style> <filter id="ada-a" x="49.614" y="105.65" width="214.801" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="b"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="b"/> <feComposite in="SourceGraphic"/> </filter> <filter id="ada-c" x="168.324" y="27.115" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="d"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="d"/> <feComposite in="SourceGraphic"/> </filter> <filter id="ada-e" x="168.324" y="183.293" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="f"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="f"/> <feComposite in="SourceGraphic"/> </filter> <filter id="ada-g" x="287.927" y="105.65" width="214.801" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="h"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="h"/> <feComposite in="SourceGraphic"/> </filter> </defs> <g transform="translate(-5165 -2677.272)"> <path class="ada-a" d="M2580.007,3503.369l274.127-170.424L3128.8,3503.369l-274.666,173.257Z" transform="translate(2584.993 -655.673)"/> <g class="ada-l" transform="matrix(1, 0, 0, 1, 5165, 2677.27)"> <path class="ada-b" d="M749.043,1424.834l-102.9,62.941-102.9-62.941L646.142,1361Z" transform="translate(-489.13 -1253.85)"/> </g> <g class="ada-c" transform="translate(5337.824 2705.887)"> <g class="ada-k" transform="matrix(1, 0, 0, 1, -172.82, -28.61)"> <path class="ada-d" d="M871.043,1347.834l-102.9,62.941-102.9-62.941L768.142,1284Z" transform="translate(-492.42 -1255.38)"/> </g> </g> <g class="ada-j" transform="matrix(1, 0, 0, 1, 5165, 2677.27)"> <path class="ada-e" d="M871.043,1500.834l-102.9,62.941-102.9-62.941L768.142,1437Z" transform="translate(-492.42 -1252.21)"/> </g> <g class="ada-i" transform="matrix(1, 0, 0, 1, 5165, 2677.27)"> <path class="ada-f" d="M994.043,1424.834l-102.9,62.941-102.9-62.941L891.142,1361Z" transform="translate(-495.81 -1253.85)"/> </g><text class="ada-g" transform="translate(5321.528 2852)"> <tspan x="-73.32" y="0">ENHANCEMENT</tspan> </text><text class="ada-g" transform="translate(5560.528 2852)"> <tspan x="-68.384" y="0">ANTICIPATORY</tspan> </text><text class="ada-g" transform="translate(5440.528 2776)"> <tspan x="-40.474" y="0">MISSION</tspan> </text><text class="ada-h" transform="translate(5446 2937)"> <tspan x="-30.873" y="0">'. $scores['ada_percentage'] .'%</tspan> </text> </g></svg>
	';
	$d4_file_input_path = $upload_path.'/diamond4-'.$post->ID.'.svg';
	$d4_file_output_path = $upload_path.'/diamond4-'.$post->ID.'.png';
	$handle_d4 = file_put_contents( $d4_file_input_path, $diamond_4 );
	exec("inkscape $d4_file_input_path --export-png $d4_file_output_path");
	$d4_file_output_url = $upload_dir['baseurl'].'/pat-temp/diamond4-'.$post->ID.'.png';

	// Diamond 5
	$diamond_5 = '
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="500" height="296" viewBox="0 0 548.793 343.681"> <defs> <style>.ant-a{fill: #e6e8f0;}.ant-b{fill: '. $scores['enh_color'] .';}.ant-b, .ant-c{opacity: 0.2;}.ant-d{fill: '. $scores['mis_color'] .';}.ant-e{fill: '. $scores['ada_color'] .'; opacity: 0.201;}.ant-f{fill: '. $scores['ant_color'] .';}.ant-g, .ant-h{fill: #fff; font-family: Roboto-Medium, Roboto, lato, sans-serif; font-weight: 500;}.ant-g{font-size: 20px;}.ant-h{font-size: 33px;}.ant-i{filter: url(#ant-g);}.ant-j{filter: url(#ant-e);}.ant-k{filter: url(#ant-c);}.ant-l{filter: url(#ant-a);}</style> <filter id="ant-a" x="49.614" y="105.65" width="214.801" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="b"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="b"/> <feComposite in="SourceGraphic"/> </filter> <filter id="ant-c" x="168.324" y="27.115" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="d"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="d"/> <feComposite in="SourceGraphic"/> </filter> <filter id="ant-e" x="168.324" y="183.293" width="214.802" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="f"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="f"/> <feComposite in="SourceGraphic"/> </filter> <filter id="ant-g" x="287.927" y="105.65" width="214.801" height="135.775" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="h"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="h"/> <feComposite in="SourceGraphic"/> </filter> </defs> <g transform="translate(-5165 -2256.272)"> <path class="ant-a" d="M2580.007,3503.369l274.127-170.424L3128.8,3503.369l-274.666,173.257Z" transform="translate(2584.993 -1076.673)"/> <g class="ant-l" transform="matrix(1, 0, 0, 1, 5165, 2256.27)"> <path class="ant-b" d="M749.043,1424.834l-102.9,62.941-102.9-62.941L646.142,1361Z" transform="translate(-489.13 -1253.85)"/> </g> <g class="ant-c" transform="translate(5337.824 2284.887)"> <g class="ant-k" transform="matrix(1, 0, 0, 1, -172.82, -28.61)"> <path class="ant-d" d="M871.043,1347.834l-102.9,62.941-102.9-62.941L768.142,1284Z" transform="translate(-492.42 -1255.38)"/> </g> </g> <g class="ant-j" transform="matrix(1, 0, 0, 1, 5165, 2256.27)"> <path class="ant-e" d="M871.043,1500.834l-102.9,62.941-102.9-62.941L768.142,1437Z" transform="translate(-492.42 -1252.21)"/> </g> <g class="ant-i" transform="matrix(1, 0, 0, 1, 5165, 2256.27)"> <path class="ant-f" d="M994.043,1424.834l-102.9,62.941-102.9-62.941L891.142,1361Z" transform="translate(-495.81 -1253.85)"/> </g><text class="ant-g" transform="translate(5321.528 2431)"> <tspan x="-73.32" y="0">ENHANCEMENT</tspan> </text><text class="ant-g" transform="translate(5436.528 2511)"> <tspan x="-47.148" y="0">ADAPTIVE</tspan> </text><text class="ant-g" transform="translate(5440.528 2355)"> <tspan x="-40.474" y="0">MISSION</tspan> </text><text class="ant-h" transform="translate(5566 2436)"> <tspan x="-30.873" y="0">'. $scores['ant_percentage'] .'%</tspan> </text> </g></svg>
	';
	$d5_file_input_path = $upload_path.'/diamond5-'.$post->ID.'.svg';
	$d5_file_output_path = $upload_path.'/diamond5-'.$post->ID.'.png';
	$handle_d5 = file_put_contents( $d5_file_input_path, $diamond_5 );
	exec("inkscape $d5_file_input_path --export-png $d5_file_output_path");
	$d5_file_output_url = $upload_dir['baseurl'].'/pat-temp/diamond5-'.$post->ID.'.png';

	// Module 2 diamond
	$hide_datafacet1 = (count($scores['m2']['1-enh']) == 0 || count($scores['m2']['1-enh']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster1 = (count($scores['m2']['1-enh']) <= 16 ) ? 'svg-hide' : '';
	$hide_datafacet2 = (count($scores['m2']['2-mis']) == 0 || count($scores['m2']['2-mis']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster2 = (count($scores['m2']['2-mis']) <= 16 ) ? 'svg-hide' : '';
	$hide_datafacet3 = (count($scores['m2']['3-ant']) == 0 || count($scores['m2']['3-ant']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster3 = (count($scores['m2']['3-ant']) <= 16 ) ? 'svg-hide' : '';
	$hide_datafacet4 = (count($scores['m2']['4-ada']) == 0 || count($scores['m2']['4-ada']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster4 = (count($scores['m2']['4-ada']) <= 16 ) ? 'svg-hide' : '';
	$hide_datafacet5 = (count($scores['m2']['5-sus']) == 0 || count($scores['m2']['5-sus']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster5 = (count($scores['m2']['5-sus']) <= 16 ) ? 'svg-hide' : '';
	$hide_datafacet6 = (count($scores['m2']['6-tra']) == 0 || count($scores['m2']['6-tra']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster6 = (count($scores['m2']['6-tra']) <= 16 ) ? 'svg-hide' : '';
	$hide_datafacet7 = (count($scores['m2']['7-dis']) == 0 || count($scores['m2']['7-dis']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster7 = (count($scores['m2']['7-dis']) <= 16 ) ? 'svg-hide' : '';
	$hide_datafacet8 = (count($scores['m2']['8-opt']) == 0 || count($scores['m2']['8-opt']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster8 = (count($scores['m2']['8-opt']) <= 16 ) ? 'svg-hide' : '';
	$hide_datafacet9 = (count($scores['m2']['9-mix']) == 0 || count($scores['m2']['9-mix']) > 16 ) ? 'svg-hide' : '';
	$hide_cluster9 = (count($scores['m2']['9-mix']) <= 16 ) ? 'svg-hide' : '';
	$mod2_diamond = '
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="762" height="395" viewBox="0 0 762 395">
    <defs>
      <style>
        .svg-hide {
          display: none;
        }
      </style>
      <filter id="border" x="89.168" y="13.933" width="590.185" height="373.532" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="facet-1" x="108.113" y="132.968" width="214.8" height="135.771" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="1.5" result="blur-2"/>
        <feFlood flood-opacity="0.349"/>
        <feComposite operator="in" in2="blur-2"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="facet-2" x="273.817" y="31.425" width="214.8" height="135.771" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="1.5" result="blur-3"/>
        <feFlood flood-opacity="0.349"/>
        <feComposite operator="in" in2="blur-3"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="facet-3" x="273.823" y="235.608" width="214.8" height="135.771" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="1.5" result="blur-4"/>
        <feFlood flood-opacity="0.349"/>
        <feComposite operator="in" in2="blur-4"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="facet-4" x="443.433" y="134.968" width="214.8" height="135.771" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="1.5" result="blur-5"/>
        <feFlood flood-opacity="0.349"/>
        <feComposite operator="in" in2="blur-5"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-1" x="192" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-6"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-6"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-2" x="209" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-7"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-7"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-3" x="209" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-8"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-8"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-4" x="192" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-9"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-9"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-5" x="192" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-10"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-10"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-6" x="226" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-11"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-11"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-7" x="192" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-12"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-12"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-8" x="175" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-13"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-13"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-9" x="209" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-14"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-14"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-10" x="226" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-15"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-15"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-11" x="209" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-16"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-16"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-12" x="175" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-17"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-17"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-13" x="175" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-18"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-18"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-14" x="226" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-19"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-19"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-15" x="226" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-20"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-20"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-1-16" x="175" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-21"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-21"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53" x="189.5" y="175.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-22"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-22"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-1" x="358" y="75.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-23"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-23"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-2" x="375" y="92.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-24"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-24"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-3" x="375" y="75.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-25"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-25"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-4" x="358" y="92.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-26"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-26"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-5" x="358" y="58.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-27"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-27"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-6" x="392" y="92.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-28"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-28"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-7" x="358" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-29"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-29"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-8" x="341" y="75.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-30"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-30"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-9" x="375" y="58.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-31"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-31"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-10" x="392" y="75.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-32"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-32"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-11" x="375" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-33"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-33"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-12" x="341" y="92.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-34"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-34"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-13" x="341" y="58.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-35"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-35"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-14" x="392" y="58.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-36"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-36"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-15" x="392" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-37"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-37"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-2-16" x="341" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-38"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-38"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53-2" x="355.5" y="73.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-39"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-39"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-1" x="527" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-40"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-40"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-2" x="544" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-41"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-41"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-3" x="544" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-42"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-42"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-4" x="527" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-43"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-43"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-5" x="527" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-44"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-44"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-6" x="561" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-45"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-45"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-7" x="527" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-46"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-46"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-8" x="510" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-47"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-47"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-9" x="544" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-48"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-48"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-10" x="561" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-49"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-49"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-11" x="544" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-50"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-50"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-12" x="510" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-51"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-51"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-13" x="510" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-52"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-52"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-14" x="561" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-53"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-53"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-15" x="561" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-54"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-54"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-3-16" x="510" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-55"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-55"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53-3" x="524.5" y="175.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-56"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-56"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-1" x="358" y="279.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-57"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-57"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-2" x="375" y="296.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-58"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-58"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-3" x="375" y="279.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-59"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-59"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-4" x="358" y="296.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-60"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-60"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-5" x="358" y="262.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-61"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-61"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-6" x="392" y="296.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-62"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-62"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-7" x="358" y="313.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-63"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-63"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-8" x="341" y="279.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-64"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-64"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-9" x="375" y="262.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-65"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-65"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-10" x="392" y="279.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-66"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-66"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-11" x="375" y="313.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-67"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-67"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-12" x="341" y="296.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-68"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-68"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-13" x="341" y="262.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-69"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-69"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-14" x="392" y="262.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-70"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-70"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-15" x="392" y="313.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-71"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-71"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-4-16" x="341" y="313.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-72"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-72"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53-4" x="355.5" y="277.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-73"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-73"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-1" x="277" y="126.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-74"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-74"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-2" x="294" y="143.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-75"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-75"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-3" x="294" y="126.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-76"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-76"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-4" x="277" y="143.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-77"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-77"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-5" x="277" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-78"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-78"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-6" x="311" y="143.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-79"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-79"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-7" x="277" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-80"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-80"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-8" x="260" y="126.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-81"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-81"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-9" x="294" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-82"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-82"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-10" x="311" y="126.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-83"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-83"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-11" x="294" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-84"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-84"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-12" x="260" y="143.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-85"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-85"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-13" x="260" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-86"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-86"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-14" x="311" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-87"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-87"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-15" x="311" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-88"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-88"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-5-16" x="260" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-89"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-89"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53-5" x="274.5" y="124.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-90"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-90"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-1" x="443" y="126.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-91"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-91"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-2" x="460" y="143.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-92"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-92"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-3" x="460" y="126.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-93"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-93"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-4" x="443" y="143.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-94"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-94"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-5" x="443" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-95"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-95"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-6" x="477" y="143.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-96"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-96"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-7" x="443" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-97"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-97"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-8" x="426" y="126.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-98"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-98"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-9" x="460" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-99"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-99"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-10" x="477" y="126.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-100"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-100"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-11" x="460" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-101"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-101"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-12" x="426" y="143.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-102"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-102"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-13" x="426" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-103"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-103"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-14" x="477" y="109.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-104"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-104"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-15" x="477" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-105"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-105"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-6-16" x="426" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-106"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-106"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53-6" x="440.5" y="124.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-107"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-107"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-1" x="443" y="232.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-108"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-108"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-2" x="460" y="249.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-109"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-109"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-3" x="460" y="232.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-110"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-110"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-4" x="443" y="249.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-111"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-111"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-5" x="443" y="215.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-112"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-112"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-6" x="477" y="249.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-113"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-113"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-7" x="443" y="266.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-114"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-114"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-8" x="426" y="232.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-115"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-115"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-9" x="460" y="215.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-116"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-116"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-10" x="477" y="232.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-117"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-117"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-11" x="460" y="266.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-118"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-118"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-12" x="426" y="249.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-119"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-119"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-13" x="426" y="215.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-120"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-120"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-14" x="477" y="215.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-121"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-121"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-15" x="477" y="266.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-122"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-122"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-7-16" x="426" y="266.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-123"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-123"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53-7" x="440.5" y="230.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-124"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-124"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-1" x="277" y="232.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-125"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-125"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-2" x="294" y="249.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-126"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-126"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-3" x="294" y="232.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-127"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-127"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-4" x="277" y="249.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-128"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-128"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-5" x="277" y="215.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-129"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-129"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-6" x="311" y="249.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-130"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-130"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-7" x="277" y="266.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-131"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-131"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-8" x="260" y="232.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-132"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-132"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-9" x="294" y="215.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-133"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-133"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-10" x="311" y="232.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-134"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-134"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-11" x="294" y="266.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-135"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-135"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-12" x="260" y="249.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-136"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-136"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-13" x="260" y="215.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-137"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-137"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-14" x="311" y="215.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-138"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-138"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-15" x="311" y="266.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-139"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-139"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-8-16" x="260" y="266.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-140"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-140"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53-8" x="274.5" y="230.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-141"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-141"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-1" x="358" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-142"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-142"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-2" x="375" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-143"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-143"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-3" x="375" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-144"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-144"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-4" x="358" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-145"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-145"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-5" x="358" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-146"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-146"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-6" x="392" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-147"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-147"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-7" x="358" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-148"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-148"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-8" x="341" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-149"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-149"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-9" x="375" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-150"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-150"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-10" x="392" y="177.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-151"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-151"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-11" x="375" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-152"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-152"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-12" x="341" y="194.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-153"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-153"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-13" x="341" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-154"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-154"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-14" x="392" y="160.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-155"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-155"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-15" x="392" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-156"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-156"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="dot-9-16" x="341" y="211.538" width="30" height="30" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-157"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-157"/>
        <feComposite in="SourceGraphic"/>
      </filter>
      <filter id="Ellisse_53-9" x="355.5" y="175.028" width="52" height="52" filterUnits="userSpaceOnUse">
        <feOffset dy="3" input="SourceAlpha"/>
        <feGaussianBlur stdDeviation="3" result="blur-158"/>
        <feFlood flood-opacity="0.161"/>
        <feComposite operator="in" in2="blur-158"/>
        <feComposite in="SourceGraphic"/>
      </filter>
    </defs>
    <g id="Raggruppa_208" data-name="Raggruppa 208" transform="translate(-6536 -3553.295)">
      <g id="main-group" data-name="main-group" transform="translate(1369.5 1115.333)">
        <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#border)">
          <path id="border-2" data-name="border" d="M2575.51,3513.15l281.833-176.833L3142.01,3515.65l-284.667,172.667Z" transform="translate(-2474.51 -3314.61)" fill="none" stroke="#fff" stroke-width="3"/>
        </g>
        <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#facet-1)">
          <path id="facet-1-2" data-name="facet-1" d="M749.043,1424.83l-102.9,62.941-102.9-62.941,102.9-63.83Z" transform="translate(-430.63 -1226.53)" fill="'. $scores['m2-colors']['enh'] .'"/>
        </g>
        <g id="Componente_4_15" data-name="Componente 4 – 15" transform="translate(5444.824 2470.887)">
          <g transform="matrix(1, 0, 0, 1, -278.32, -32.93)" filter="url(#facet-2)">
            <path id="facet-2-2" data-name="facet-2" d="M871.043,1347.83l-102.9,62.941-102.9-62.941,102.9-63.83Z" transform="translate(-386.93 -1251.07)" fill="'. $scores['m2-colors']['mis'] .'"/>
          </g>
        </g>
        <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#facet-3)">
          <path id="facet-3-2" data-name="facet-3" d="M871.043,1500.83l-102.9,62.941-102.9-62.941,102.9-63.83Z" transform="translate(-386.92 -1199.89)" fill="'. $scores['m2-colors']['ada'] .'"/>
        </g>
        <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#facet-4)">
          <path id="facet-4-2" data-name="facet-4" d="M994.043,1424.83l-102.9,62.941-102.9-62.941,102.9-63.83Z" transform="translate(-340.31 -1224.53)" fill="'. $scores['m2-colors']['ant'] .'"/>
        </g>
        <g id="data-facet-1">
          <g id="data-dots-1" class="'. $hide_datafacet1 .'">
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-1)">
              <circle id="dot-1-1-2" data-name="dot-1-1" data-project-title="'.  $scores['m2']['1-enh'][0]['title'] .'" cx="'.  $scores['m2']['1-enh'][0]['circle'] .'" cy="'.  $scores['m2']['1-enh'][0]['circle'] .'" r="'.  $scores['m2']['1-enh'][0]['circle'] .'" transform="translate(213 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-2)">
              <circle id="dot-1-2-2" data-name="dot-1-2" data-project-title="'.  $scores['m2']['1-enh'][1]['title'] .'" cx="'.  $scores['m2']['1-enh'][1]['circle'] .'" cy="'.  $scores['m2']['1-enh'][1]['circle'] .'" r="'.  $scores['m2']['1-enh'][1]['circle'] .'" transform="translate(230 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-3)">
              <circle id="dot-1-3-2" data-name="dot-1-3" data-project-title="'.  $scores['m2']['1-enh'][2]['title'] .'" cx="'.  $scores['m2']['1-enh'][2]['circle'] .'" cy="'.  $scores['m2']['1-enh'][2]['circle'] .'" r="'.  $scores['m2']['1-enh'][2]['circle'] .'" transform="translate(230 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-4)">
              <circle id="dot-1-4-2" data-name="dot-1-4" data-project-title="'.  $scores['m2']['1-enh'][3]['title'] .'" cx="'.  $scores['m2']['1-enh'][3]['circle'] .'" cy="'.  $scores['m2']['1-enh'][3]['circle'] .'" r="'.  $scores['m2']['1-enh'][3]['circle'] .'" transform="translate(213 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-5)">
              <circle id="dot-1-5-2" data-name="dot-1-5" data-project-title="'.  $scores['m2']['1-enh'][4]['title'] .'" cx="'.  $scores['m2']['1-enh'][4]['circle'] .'" cy="'.  $scores['m2']['1-enh'][4]['circle'] .'" r="'.  $scores['m2']['1-enh'][4]['circle'] .'" transform="translate(213 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-6)">
              <circle id="dot-1-6-2" data-name="dot-1-6" data-project-title="'.  $scores['m2']['1-enh'][5]['title'] .'" cx="'.  $scores['m2']['1-enh'][5]['circle'] .'" cy="'.  $scores['m2']['1-enh'][5]['circle'] .'" r="'.  $scores['m2']['1-enh'][5]['circle'] .'" transform="translate(247 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-7)">
              <circle id="dot-1-7-2" data-name="dot-1-7" data-project-title="'.  $scores['m2']['1-enh'][6]['title'] .'" cx="'.  $scores['m2']['1-enh'][6]['circle'] .'" cy="'.  $scores['m2']['1-enh'][6]['circle'] .'" r="'.  $scores['m2']['1-enh'][6]['circle'] .'" transform="translate(213 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-8)">
              <circle id="dot-1-8-2" data-name="dot-1-8" data-project-title="'.  $scores['m2']['1-enh'][7]['title'] .'" cx="'.  $scores['m2']['1-enh'][7]['circle'] .'" cy="'.  $scores['m2']['1-enh'][7]['circle'] .'" r="'.  $scores['m2']['1-enh'][7]['circle'] .'" transform="translate(196 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-9)">
              <circle id="dot-1-9-2" data-name="dot-1-9" data-project-title="'.  $scores['m2']['1-enh'][8]['title'] .'" cx="'.  $scores['m2']['1-enh'][8]['circle'] .'" cy="'.  $scores['m2']['1-enh'][8]['circle'] .'" r="'.  $scores['m2']['1-enh'][8]['circle'] .'" transform="translate(230 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-10)">
              <circle id="dot-1-10-2" data-name="dot-1-10" data-project-title="'.  $scores['m2']['1-enh'][9]['title'] .'" cx="'.  $scores['m2']['1-enh'][9]['circle'] .'" cy="'.  $scores['m2']['1-enh'][9]['circle'] .'" r="'.  $scores['m2']['1-enh'][9]['circle'] .'" transform="translate(247 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-11)">
              <circle id="dot-1-11-2" data-name="dot-1-11" data-project-title="'.  $scores['m2']['1-enh'][10]['title'] .'" cx="'.  $scores['m2']['1-enh'][10]['circle'] .'" cy="'.  $scores['m2']['1-enh'][10]['circle'] .'" r="'.  $scores['m2']['1-enh'][10]['circle'] .'" transform="translate(230 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-12)">
              <circle id="dot-1-12-2" data-name="dot-1-12" data-project-title="'.  $scores['m2']['1-enh'][11]['title'] .'" cx="'.  $scores['m2']['1-enh'][11]['circle'] .'" cy="'.  $scores['m2']['1-enh'][11]['circle'] .'" r="'.  $scores['m2']['1-enh'][11]['circle'] .'" transform="translate(196 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-13)">
              <circle id="dot-1-13-2" data-name="dot-1-13" data-project-title="'.  $scores['m2']['1-enh'][12]['title'] .'" cx="'.  $scores['m2']['1-enh'][12]['circle'] .'" cy="'.  $scores['m2']['1-enh'][12]['circle'] .'" r="'.  $scores['m2']['1-enh'][12]['circle'] .'" transform="translate(196 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-14)">
              <circle id="dot-1-14-2" data-name="dot-1-14" data-project-title="'.  $scores['m2']['1-enh'][13]['title'] .'" cx="'.  $scores['m2']['1-enh'][13]['circle'] .'" cy="'.  $scores['m2']['1-enh'][13]['circle'] .'" r="'.  $scores['m2']['1-enh'][13]['circle'] .'" transform="translate(247 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-15)">
              <circle id="dot-1-15-2" data-name="dot-1-15" data-project-title="'.  $scores['m2']['1-enh'][14]['title'] .'" cx="'.  $scores['m2']['1-enh'][14]['circle'] .'" cy="'.  $scores['m2']['1-enh'][14]['circle'] .'" r="'.  $scores['m2']['1-enh'][14]['circle'] .'" transform="translate(247 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5166.5, 2437.96)" filter="url(#dot-1-16)">
              <circle id="dot-1-16-2" data-name="dot-1-16" data-project-title="'.  $scores['m2']['1-enh'][15]['title'] .'" cx="'.  $scores['m2']['1-enh'][15]['circle'] .'" cy="'.  $scores['m2']['1-enh'][15]['circle'] .'" r="'.  $scores['m2']['1-enh'][15]['circle'] .'" transform="translate(196 217.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-1" class="'.  $hide_cluster1 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -198.3, -180.84)" filter="url(#Ellisse_53)">
              </g>
              <circle id="Ellisse_53-10" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_01" data-name="01" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['1-enh']) .'</tspan></text>
          </g>
        </g>
        <g id="data-facet-2" transform="translate(166 -102)">
          <g id="data-dots-2" class="'. $hide_datafacet2 .'">
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-1)">
              <circle id="dot-2-1-2" data-name="dot-2-1" data-project-title="'.  $scores['m2']['2-mis'][0]['title'] .'" cx="'.  $scores['m2']['2-mis'][0]['circle'] .'" cy="'.  $scores['m2']['2-mis'][0]['circle'] .'" r="'.  $scores['m2']['2-mis'][0]['circle'] .'" transform="translate(379 81.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-2)">
              <circle id="dot-2-2-2" data-name="dot-2-2" data-project-title="'.  $scores['m2']['2-mis'][1]['title'] .'" cx="'.  $scores['m2']['2-mis'][1]['circle'] .'" cy="'.  $scores['m2']['2-mis'][1]['circle'] .'" r="'.  $scores['m2']['2-mis'][1]['circle'] .'" transform="translate(396 98.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-3)">
              <circle id="dot-2-3-2" data-name="dot-2-3" data-project-title="'.  $scores['m2']['2-mis'][2]['title'] .'" cx="'.  $scores['m2']['2-mis'][2]['circle'] .'" cy="'.  $scores['m2']['2-mis'][2]['circle'] .'" r="'.  $scores['m2']['2-mis'][2]['circle'] .'" transform="translate(396 81.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-4)">
              <circle id="dot-2-4-2" data-name="dot-2-4" data-project-title="'.  $scores['m2']['2-mis'][3]['title'] .'" cx="'.  $scores['m2']['2-mis'][3]['circle'] .'" cy="'.  $scores['m2']['2-mis'][3]['circle'] .'" r="'.  $scores['m2']['2-mis'][3]['circle'] .'" transform="translate(379 98.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-5)">
              <circle id="dot-2-5-2" data-name="dot-2-5" data-project-title="'.  $scores['m2']['2-mis'][4]['title'] .'" cx="'.  $scores['m2']['2-mis'][4]['circle'] .'" cy="'.  $scores['m2']['2-mis'][4]['circle'] .'" r="'.  $scores['m2']['2-mis'][4]['circle'] .'" transform="translate(379 64.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-6)">
              <circle id="dot-2-6-2" data-name="dot-2-6" data-project-title="'.  $scores['m2']['2-mis'][5]['title'] .'" cx="'.  $scores['m2']['2-mis'][5]['circle'] .'" cy="'.  $scores['m2']['2-mis'][5]['circle'] .'" r="'.  $scores['m2']['2-mis'][5]['circle'] .'" transform="translate(413 98.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-7)">
              <circle id="dot-2-7-2" data-name="dot-2-7" data-project-title="'.  $scores['m2']['2-mis'][6]['title'] .'" cx="'.  $scores['m2']['2-mis'][6]['circle'] .'" cy="'.  $scores['m2']['2-mis'][6]['circle'] .'" r="'.  $scores['m2']['2-mis'][6]['circle'] .'" transform="translate(379 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-8)">
              <circle id="dot-2-8-2" data-name="dot-2-8" data-project-title="'.  $scores['m2']['2-mis'][7]['title'] .'" cx="'.  $scores['m2']['2-mis'][7]['circle'] .'" cy="'.  $scores['m2']['2-mis'][7]['circle'] .'" r="'.  $scores['m2']['2-mis'][7]['circle'] .'" transform="translate(362 81.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-9)">
              <circle id="dot-2-9-2" data-name="dot-2-9" data-project-title="'.  $scores['m2']['2-mis'][8]['title'] .'" cx="'.  $scores['m2']['2-mis'][8]['circle'] .'" cy="'.  $scores['m2']['2-mis'][8]['circle'] .'" r="'.  $scores['m2']['2-mis'][8]['circle'] .'" transform="translate(396 64.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-10)">
              <circle id="dot-2-10-2" data-name="dot-2-10" data-project-title="'.  $scores['m2']['2-mis'][9]['title'] .'" cx="'.  $scores['m2']['2-mis'][9]['circle'] .'" cy="'.  $scores['m2']['2-mis'][9]['circle'] .'" r="'.  $scores['m2']['2-mis'][9]['circle'] .'" transform="translate(413 81.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-11)">
              <circle id="dot-2-11-2" data-name="dot-2-11" data-project-title="'.  $scores['m2']['2-mis'][10]['title'] .'" cx="'.  $scores['m2']['2-mis'][10]['circle'] .'" cy="'.  $scores['m2']['2-mis'][10]['circle'] .'" r="'.  $scores['m2']['2-mis'][10]['circle'] .'" transform="translate(396 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-12)">
              <circle id="dot-2-12-2" data-name="dot-2-12" data-project-title="'.  $scores['m2']['2-mis'][11]['title'] .'" cx="'.  $scores['m2']['2-mis'][11]['circle'] .'" cy="'.  $scores['m2']['2-mis'][11]['circle'] .'" r="'.  $scores['m2']['2-mis'][11]['circle'] .'" transform="translate(362 98.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-13)">
              <circle id="dot-2-13-2" data-name="dot-2-13" data-project-title="'.  $scores['m2']['2-mis'][12]['title'] .'" cx="'.  $scores['m2']['2-mis'][12]['circle'] .'" cy="'.  $scores['m2']['2-mis'][12]['circle'] .'" r="'.  $scores['m2']['2-mis'][12]['circle'] .'" transform="translate(362 64.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-14)">
              <circle id="dot-2-14-2" data-name="dot-2-14" data-project-title="'.  $scores['m2']['2-mis'][13]['title'] .'" cx="'.  $scores['m2']['2-mis'][13]['circle'] .'" cy="'.  $scores['m2']['2-mis'][13]['circle'] .'" r="'.  $scores['m2']['2-mis'][13]['circle'] .'" transform="translate(413 64.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-15)">
              <circle id="dot-2-15-2" data-name="dot-2-15" data-project-title="'.  $scores['m2']['2-mis'][14]['title'] .'" cx="'.  $scores['m2']['2-mis'][14]['circle'] .'" cy="'.  $scores['m2']['2-mis'][14]['circle'] .'" r="'.  $scores['m2']['2-mis'][14]['circle'] .'" transform="translate(413 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2539.96)" filter="url(#dot-2-16)">
              <circle id="dot-2-16-2" data-name="dot-2-16" data-project-title="'.  $scores['m2']['2-mis'][15]['title'] .'" cx="'.  $scores['m2']['2-mis'][15]['circle'] .'" cy="'.  $scores['m2']['2-mis'][15]['circle'] .'" r="'.  $scores['m2']['2-mis'][15]['circle'] .'" transform="translate(362 115.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-2" class="'. $hide_cluster2 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126-2" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -364.3, -78.84)" filter="url(#Ellisse_53-2)">
              </g>
              <circle id="Ellisse_53-11" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_02" data-name="02" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['2-mis']) .'</tspan></text>
          </g>
        </g>
        <g id="data-facet-3" transform="translate(335)">
          <g id="data-dots-3" class="'. $hide_datafacet3 .'">
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-1)">
              <circle id="dot-3-1-2" data-name="dot-3-1" data-project-title="'.  $scores['m2']['3-ant'][0]['title'] .'" cx="'.  $scores['m2']['3-ant'][0]['circle'] .'" cy="'.  $scores['m2']['3-ant'][0]['circle'] .'" r="'.  $scores['m2']['3-ant'][0]['circle'] .'" transform="translate(548 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-2)">
              <circle id="dot-3-2-2" data-name="dot-3-2" data-project-title="'.  $scores['m2']['3-ant'][1]['title'] .'" cx="'.  $scores['m2']['3-ant'][1]['circle'] .'" cy="'.  $scores['m2']['3-ant'][1]['circle'] .'" r="'.  $scores['m2']['3-ant'][1]['circle'] .'" transform="translate(565 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-3)">
              <circle id="dot-3-3-2" data-name="dot-3-3" data-project-title="'.  $scores['m2']['3-ant'][2]['title'] .'" cx="'.  $scores['m2']['3-ant'][2]['circle'] .'" cy="'.  $scores['m2']['3-ant'][2]['circle'] .'" r="'.  $scores['m2']['3-ant'][2]['circle'] .'" transform="translate(565 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-4)">
              <circle id="dot-3-4-2" data-name="dot-3-4" data-project-title="'.  $scores['m2']['3-ant'][3]['title'] .'" cx="'.  $scores['m2']['3-ant'][3]['circle'] .'" cy="'.  $scores['m2']['3-ant'][3]['circle'] .'" r="'.  $scores['m2']['3-ant'][3]['circle'] .'" transform="translate(548 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-5)">
              <circle id="dot-3-5-2" data-name="dot-3-5" data-project-title="'.  $scores['m2']['3-ant'][4]['title'] .'" cx="'.  $scores['m2']['3-ant'][4]['circle'] .'" cy="'.  $scores['m2']['3-ant'][4]['circle'] .'" r="'.  $scores['m2']['3-ant'][4]['circle'] .'" transform="translate(548 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-6)">
              <circle id="dot-3-6-2" data-name="dot-3-6" data-project-title="'.  $scores['m2']['3-ant'][5]['title'] .'" cx="'.  $scores['m2']['3-ant'][5]['circle'] .'" cy="'.  $scores['m2']['3-ant'][5]['circle'] .'" r="'.  $scores['m2']['3-ant'][5]['circle'] .'" transform="translate(582 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-7)">
              <circle id="dot-3-7-2" data-name="dot-3-7" data-project-title="'.  $scores['m2']['3-ant'][6]['title'] .'" cx="'.  $scores['m2']['3-ant'][6]['circle'] .'" cy="'.  $scores['m2']['3-ant'][6]['circle'] .'" r="'.  $scores['m2']['3-ant'][6]['circle'] .'" transform="translate(548 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-8)">
              <circle id="dot-3-8-2" data-name="dot-3-8" data-project-title="'.  $scores['m2']['3-ant'][7]['title'] .'" cx="'.  $scores['m2']['3-ant'][7]['circle'] .'" cy="'.  $scores['m2']['3-ant'][7]['circle'] .'" r="'.  $scores['m2']['3-ant'][7]['circle'] .'" transform="translate(531 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-9)">
              <circle id="dot-3-9-2" data-name="dot-3-9" data-project-title="'.  $scores['m2']['3-ant'][8]['title'] .'" cx="'.  $scores['m2']['3-ant'][8]['circle'] .'" cy="'.  $scores['m2']['3-ant'][8]['circle'] .'" r="'.  $scores['m2']['3-ant'][8]['circle'] .'" transform="translate(565 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-10)">
              <circle id="dot-3-10-2" data-name="dot-3-10" data-project-title="'.  $scores['m2']['3-ant'][9]['title'] .'" cx="'.  $scores['m2']['3-ant'][9]['circle'] .'" cy="'.  $scores['m2']['3-ant'][9]['circle'] .'" r="'.  $scores['m2']['3-ant'][9]['circle'] .'" transform="translate(582 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-11)">
              <circle id="dot-3-11-2" data-name="dot-3-11" data-project-title="'.  $scores['m2']['3-ant'][10]['title'] .'" cx="'.  $scores['m2']['3-ant'][10]['circle'] .'" cy="'.  $scores['m2']['3-ant'][10]['circle'] .'" r="'.  $scores['m2']['3-ant'][10]['circle'] .'" transform="translate(565 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-12)">
              <circle id="dot-3-12-2" data-name="dot-3-12" data-project-title="'.  $scores['m2']['3-ant'][11]['title'] .'" cx="'.  $scores['m2']['3-ant'][11]['circle'] .'" cy="'.  $scores['m2']['3-ant'][11]['circle'] .'" r="'.  $scores['m2']['3-ant'][11]['circle'] .'" transform="translate(531 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-13)">
              <circle id="dot-3-13-2" data-name="dot-3-13" data-project-title="'.  $scores['m2']['3-ant'][12]['title'] .'" cx="'.  $scores['m2']['3-ant'][12]['circle'] .'" cy="'.  $scores['m2']['3-ant'][12]['circle'] .'" r="'.  $scores['m2']['3-ant'][12]['circle'] .'" transform="translate(531 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-14)">
              <circle id="dot-3-14-2" data-name="dot-3-14" data-project-title="'.  $scores['m2']['3-ant'][13]['title'] .'" cx="'.  $scores['m2']['3-ant'][13]['circle'] .'" cy="'.  $scores['m2']['3-ant'][13]['circle'] .'" r="'.  $scores['m2']['3-ant'][13]['circle'] .'" transform="translate(582 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-15)">
              <circle id="dot-3-15-2" data-name="dot-3-15" data-project-title="'.  $scores['m2']['3-ant'][14]['title'] .'" cx="'.  $scores['m2']['3-ant'][14]['circle'] .'" cy="'.  $scores['m2']['3-ant'][14]['circle'] .'" r="'.  $scores['m2']['3-ant'][14]['circle'] .'" transform="translate(582 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4831.5, 2437.96)" filter="url(#dot-3-16)">
              <circle id="dot-3-16-2" data-name="dot-3-16" data-project-title="'.  $scores['m2']['3-ant'][15]['title'] .'" cx="'.  $scores['m2']['3-ant'][15]['circle'] .'" cy="'.  $scores['m2']['3-ant'][15]['circle'] .'" r="'.  $scores['m2']['3-ant'][15]['circle'] .'" transform="translate(531 217.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-3" class="'. $hide_cluster3 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126-3" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -533.3, -180.84)" filter="url(#Ellisse_53-3)">
              </g>
              <circle id="Ellisse_53-12" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_03" data-name="03" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['3-ant']) .'</tspan></text>
          </g>
        </g>
        <g id="data-facet-4" transform="translate(166 102)">
          <g id="facet-dots-4" class="'. $hide_datafacet4 .'">
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-1)">
              <circle id="dot-4-1-2" data-name="dot-4-1" data-project-title="'.  $scores['m2']['4-ada'][0]['title'] .'" cx="'.  $scores['m2']['4-ada'][0]['circle'] .'" cy="'.  $scores['m2']['4-ada'][0]['circle'] .'" r="'.  $scores['m2']['4-ada'][0]['circle'] .'" transform="translate(379 285.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-2)">
              <circle id="dot-4-2-2" data-name="dot-4-2" data-project-title="'.  $scores['m2']['4-ada'][1]['title'] .'" cx="'.  $scores['m2']['4-ada'][1]['circle'] .'" cy="'.  $scores['m2']['4-ada'][1]['circle'] .'" r="'.  $scores['m2']['4-ada'][1]['circle'] .'" transform="translate(396 302.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-3)">
              <circle id="dot-4-3-2" data-name="dot-4-3" data-project-title="'.  $scores['m2']['4-ada'][2]['title'] .'" cx="'.  $scores['m2']['4-ada'][2]['circle'] .'" cy="'.  $scores['m2']['4-ada'][2]['circle'] .'" r="'.  $scores['m2']['4-ada'][2]['circle'] .'" transform="translate(396 285.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-4)">
              <circle id="dot-4-4-2" data-name="dot-4-4" data-project-title="'.  $scores['m2']['4-ada'][3]['title'] .'" cx="'.  $scores['m2']['4-ada'][3]['circle'] .'" cy="'.  $scores['m2']['4-ada'][3]['circle'] .'" r="'.  $scores['m2']['4-ada'][3]['circle'] .'" transform="translate(379 302.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-5)">
              <circle id="dot-4-5-2" data-name="dot-4-5" data-project-title="'.  $scores['m2']['4-ada'][4]['title'] .'" cx="'.  $scores['m2']['4-ada'][4]['circle'] .'" cy="'.  $scores['m2']['4-ada'][4]['circle'] .'" r="'.  $scores['m2']['4-ada'][4]['circle'] .'" transform="translate(379 268.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-6)">
              <circle id="dot-4-6-2" data-name="dot-4-6" data-project-title="'.  $scores['m2']['4-ada'][5]['title'] .'" cx="'.  $scores['m2']['4-ada'][5]['circle'] .'" cy="'.  $scores['m2']['4-ada'][5]['circle'] .'" r="'.  $scores['m2']['4-ada'][5]['circle'] .'" transform="translate(413 302.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-7)">
              <circle id="dot-4-7-2" data-name="dot-4-7" data-project-title="'.  $scores['m2']['4-ada'][6]['title'] .'" cx="'.  $scores['m2']['4-ada'][6]['circle'] .'" cy="'.  $scores['m2']['4-ada'][6]['circle'] .'" r="'.  $scores['m2']['4-ada'][6]['circle'] .'" transform="translate(379 319.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-8)">
              <circle id="dot-4-8-2" data-name="dot-4-8" data-project-title="'.  $scores['m2']['4-ada'][7]['title'] .'" cx="'.  $scores['m2']['4-ada'][7]['circle'] .'" cy="'.  $scores['m2']['4-ada'][7]['circle'] .'" r="'.  $scores['m2']['4-ada'][7]['circle'] .'" transform="translate(362 285.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-9)">
              <circle id="dot-4-9-2" data-name="dot-4-9" data-project-title="'.  $scores['m2']['4-ada'][8]['title'] .'" cx="'.  $scores['m2']['4-ada'][8]['circle'] .'" cy="'.  $scores['m2']['4-ada'][8]['circle'] .'" r="'.  $scores['m2']['4-ada'][8]['circle'] .'" transform="translate(396 268.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-10)">
              <circle id="dot-4-10-2" data-name="dot-4-10" data-project-title="'.  $scores['m2']['4-ada'][9]['title'] .'" cx="'.  $scores['m2']['4-ada'][9]['circle'] .'" cy="'.  $scores['m2']['4-ada'][9]['circle'] .'" r="'.  $scores['m2']['4-ada'][9]['circle'] .'" transform="translate(413 285.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-11)">
              <circle id="dot-4-11-2" data-name="dot-4-11" data-project-title="'.  $scores['m2']['4-ada'][10]['title'] .'" cx="'.  $scores['m2']['4-ada'][10]['circle'] .'" cy="'.  $scores['m2']['4-ada'][10]['circle'] .'" r="'.  $scores['m2']['4-ada'][10]['circle'] .'" transform="translate(396 319.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-12)">
              <circle id="dot-4-12-2" data-name="dot-4-12" data-project-title="'.  $scores['m2']['4-ada'][11]['title'] .'" cx="'.  $scores['m2']['4-ada'][11]['circle'] .'" cy="'.  $scores['m2']['4-ada'][11]['circle'] .'" r="'.  $scores['m2']['4-ada'][11]['circle'] .'" transform="translate(362 302.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-13)">
              <circle id="dot-4-13-2" data-name="dot-4-13" data-project-title="'.  $scores['m2']['4-ada'][12]['title'] .'" cx="'.  $scores['m2']['4-ada'][12]['circle'] .'" cy="'.  $scores['m2']['4-ada'][12]['circle'] .'" r="'.  $scores['m2']['4-ada'][12]['circle'] .'" transform="translate(362 268.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-14)">
              <circle id="dot-4-14-2" data-name="dot-4-14" data-project-title="'.  $scores['m2']['4-ada'][13]['title'] .'" cx="'.  $scores['m2']['4-ada'][13]['circle'] .'" cy="'.  $scores['m2']['4-ada'][13]['circle'] .'" r="'.  $scores['m2']['4-ada'][13]['circle'] .'" transform="translate(413 268.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-15)">
              <circle id="dot-4-15-2" data-name="dot-4-15" data-project-title="'.  $scores['m2']['4-ada'][14]['title'] .'" cx="'.  $scores['m2']['4-ada'][14]['circle'] .'" cy="'.  $scores['m2']['4-ada'][14]['circle'] .'" r="'.  $scores['m2']['4-ada'][14]['circle'] .'" transform="translate(413 319.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2335.96)" filter="url(#dot-4-16)">
              <circle id="dot-4-16-2" data-name="dot-4-16" data-project-title="'.  $scores['m2']['4-ada'][15]['title'] .'" cx="'.  $scores['m2']['4-ada'][15]['circle'] .'" cy="'.  $scores['m2']['4-ada'][15]['circle'] .'" r="'.  $scores['m2']['4-ada'][15]['circle'] .'" transform="translate(362 319.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-4" class="'. $hide_cluster4 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126-4" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -364.3, -282.84)" filter="url(#Ellisse_53-4)">
              </g>
              <circle id="Ellisse_53-13" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_04" data-name="04" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['4-ada']) .'</tspan></text>
          </g>
        </g>
        <g id="data-facet-5" transform="translate(85 -51)">
          <g id="data-dots-5" class="'. $hide_datafacet5 .'">
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-1)">
              <circle id="dot-5-1-2" data-name="dot-5-1" data-project-title="'.  $scores['m2']['5-sus'][0]['title'] .'" cx="'.  $scores['m2']['5-sus'][0]['circle'] .'" cy="'.  $scores['m2']['5-sus'][0]['circle'] .'" r="'.  $scores['m2']['5-sus'][0]['circle'] .'" transform="translate(298 132.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-2)">
              <circle id="dot-5-2-2" data-name="dot-5-2" data-project-title="'.  $scores['m2']['5-sus'][1]['title'] .'" cx="'.  $scores['m2']['5-sus'][1]['circle'] .'" cy="'.  $scores['m2']['5-sus'][1]['circle'] .'" r="'.  $scores['m2']['5-sus'][1]['circle'] .'" transform="translate(315 149.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-3)">
              <circle id="dot-5-3-2" data-name="dot-5-3" data-project-title="'.  $scores['m2']['5-sus'][2]['title'] .'" cx="'.  $scores['m2']['5-sus'][2]['circle'] .'" cy="'.  $scores['m2']['5-sus'][2]['circle'] .'" r="'.  $scores['m2']['5-sus'][2]['circle'] .'" transform="translate(315 132.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-4)">
              <circle id="dot-5-4-2" data-name="dot-5-4" data-project-title="'.  $scores['m2']['5-sus'][3]['title'] .'" cx="'.  $scores['m2']['5-sus'][3]['circle'] .'" cy="'.  $scores['m2']['5-sus'][3]['circle'] .'" r="'.  $scores['m2']['5-sus'][3]['circle'] .'" transform="translate(298 149.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-5)">
              <circle id="dot-5-5-2" data-name="dot-5-5" data-project-title="'.  $scores['m2']['5-sus'][4]['title'] .'" cx="'.  $scores['m2']['5-sus'][4]['circle'] .'" cy="'.  $scores['m2']['5-sus'][4]['circle'] .'" r="'.  $scores['m2']['5-sus'][4]['circle'] .'" transform="translate(298 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-6)">
              <circle id="dot-5-6-2" data-name="dot-5-6" data-project-title="'.  $scores['m2']['5-sus'][5]['title'] .'" cx="'.  $scores['m2']['5-sus'][5]['circle'] .'" cy="'.  $scores['m2']['5-sus'][5]['circle'] .'" r="'.  $scores['m2']['5-sus'][5]['circle'] .'" transform="translate(332 149.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-7)">
              <circle id="dot-5-7-2" data-name="dot-5-7" data-project-title="'.  $scores['m2']['5-sus'][6]['title'] .'" cx="'.  $scores['m2']['5-sus'][6]['circle'] .'" cy="'.  $scores['m2']['5-sus'][6]['circle'] .'" r="'.  $scores['m2']['5-sus'][6]['circle'] .'" transform="translate(298 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-8)">
              <circle id="dot-5-8-2" data-name="dot-5-8" data-project-title="'.  $scores['m2']['5-sus'][7]['title'] .'" cx="'.  $scores['m2']['5-sus'][7]['circle'] .'" cy="'.  $scores['m2']['5-sus'][7]['circle'] .'" r="'.  $scores['m2']['5-sus'][7]['circle'] .'" transform="translate(281 132.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-9)">
              <circle id="dot-5-9-2" data-name="dot-5-9" data-project-title="'.  $scores['m2']['5-sus'][8]['title'] .'" cx="'.  $scores['m2']['5-sus'][8]['circle'] .'" cy="'.  $scores['m2']['5-sus'][8]['circle'] .'" r="'.  $scores['m2']['5-sus'][8]['circle'] .'" transform="translate(315 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-10)">
              <circle id="dot-5-10-2" data-name="dot-5-10" data-project-title="'.  $scores['m2']['5-sus'][9]['title'] .'" cx="'.  $scores['m2']['5-sus'][9]['circle'] .'" cy="'.  $scores['m2']['5-sus'][9]['circle'] .'" r="'.  $scores['m2']['5-sus'][9]['circle'] .'" transform="translate(332 132.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-11)">
              <circle id="dot-5-11-2" data-name="dot-5-11" data-project-title="'.  $scores['m2']['5-sus'][10]['title'] .'" cx="'.  $scores['m2']['5-sus'][10]['circle'] .'" cy="'.  $scores['m2']['5-sus'][10]['circle'] .'" r="'.  $scores['m2']['5-sus'][10]['circle'] .'" transform="translate(315 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-12)">
              <circle id="dot-5-12-2" data-name="dot-5-12" data-project-title="'.  $scores['m2']['5-sus'][11]['title'] .'" cx="'.  $scores['m2']['5-sus'][11]['circle'] .'" cy="'.  $scores['m2']['5-sus'][11]['circle'] .'" r="'.  $scores['m2']['5-sus'][11]['circle'] .'" transform="translate(281 149.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-13)">
              <circle id="dot-5-13-2" data-name="dot-5-13" data-project-title="'.  $scores['m2']['5-sus'][12]['title'] .'" cx="'.  $scores['m2']['5-sus'][12]['circle'] .'" cy="'.  $scores['m2']['5-sus'][12]['circle'] .'" r="'.  $scores['m2']['5-sus'][12]['circle'] .'" transform="translate(281 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-14)">
              <circle id="dot-5-14-2" data-name="dot-5-14" data-project-title="'.  $scores['m2']['5-sus'][13]['title'] .'" cx="'.  $scores['m2']['5-sus'][13]['circle'] .'" cy="'.  $scores['m2']['5-sus'][13]['circle'] .'" r="'.  $scores['m2']['5-sus'][13]['circle'] .'" transform="translate(332 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-15)">
              <circle id="dot-5-15-2" data-name="dot-5-15" data-project-title="'.  $scores['m2']['5-sus'][14]['title'] .'" cx="'.  $scores['m2']['5-sus'][14]['circle'] .'" cy="'.  $scores['m2']['5-sus'][14]['circle'] .'" r="'.  $scores['m2']['5-sus'][14]['circle'] .'" transform="translate(332 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2488.96)" filter="url(#dot-5-16)">
              <circle id="dot-5-16-2" data-name="dot-5-16" data-project-title="'.  $scores['m2']['5-sus'][15]['title'] .'" cx="'.  $scores['m2']['5-sus'][15]['circle'] .'" cy="'.  $scores['m2']['5-sus'][15]['circle'] .'" r="'.  $scores['m2']['5-sus'][15]['circle'] .'" transform="translate(281 166.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-5" class="'. $hide_cluster5 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126-5" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -283.3, -129.84)" filter="url(#Ellisse_53-5)">
              </g>
              <circle id="Ellisse_53-14" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_05" data-name="05" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['5-sus']) .'</tspan></text>
          </g>
        </g>
        <g id="data-facet-6" transform="translate(251 -51)">
          <g id="data-dots-6" class="'. $hide_datafacet6 .'">
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-1)">
              <circle id="dot-6-1-2" data-name="dot-6-1" data-project-title="'.  $scores['m2']['6-tra'][0]['title'] .'" cx="'.  $scores['m2']['6-tra'][0]['circle'] .'" cy="'.  $scores['m2']['6-tra'][0]['circle'] .'" r="'.  $scores['m2']['6-tra'][0]['circle'] .'" transform="translate(464 132.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-2)">
              <circle id="dot-6-2-2" data-name="dot-6-2" data-project-title="'.  $scores['m2']['6-tra'][1]['title'] .'" cx="'.  $scores['m2']['6-tra'][1]['circle'] .'" cy="'.  $scores['m2']['6-tra'][1]['circle'] .'" r="'.  $scores['m2']['6-tra'][1]['circle'] .'" transform="translate(481 149.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-3)">
              <circle id="dot-6-3-2" data-name="dot-6-3" data-project-title="'.  $scores['m2']['6-tra'][2]['title'] .'" cx="'.  $scores['m2']['6-tra'][2]['circle'] .'" cy="'.  $scores['m2']['6-tra'][2]['circle'] .'" r="'.  $scores['m2']['6-tra'][2]['circle'] .'" transform="translate(481 132.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-4)">
              <circle id="dot-6-4-2" data-name="dot-6-4" data-project-title="'.  $scores['m2']['6-tra'][3]['title'] .'" cx="'.  $scores['m2']['6-tra'][3]['circle'] .'" cy="'.  $scores['m2']['6-tra'][3]['circle'] .'" r="'.  $scores['m2']['6-tra'][3]['circle'] .'" transform="translate(464 149.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-5)">
              <circle id="dot-6-5-2" data-name="dot-6-5" data-project-title="'.  $scores['m2']['6-tra'][4]['title'] .'" cx="'.  $scores['m2']['6-tra'][4]['circle'] .'" cy="'.  $scores['m2']['6-tra'][4]['circle'] .'" r="'.  $scores['m2']['6-tra'][4]['circle'] .'" transform="translate(464 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-6)">
              <circle id="dot-6-6-2" data-name="dot-6-6" data-project-title="'.  $scores['m2']['6-tra'][5]['title'] .'" cx="'.  $scores['m2']['6-tra'][5]['circle'] .'" cy="'.  $scores['m2']['6-tra'][5]['circle'] .'" r="'.  $scores['m2']['6-tra'][5]['circle'] .'" transform="translate(498 149.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-7)">
              <circle id="dot-6-7-2" data-name="dot-6-7" data-project-title="'.  $scores['m2']['6-tra'][6]['title'] .'" cx="'.  $scores['m2']['6-tra'][6]['circle'] .'" cy="'.  $scores['m2']['6-tra'][6]['circle'] .'" r="'.  $scores['m2']['6-tra'][6]['circle'] .'" transform="translate(464 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-8)">
              <circle id="dot-6-8-2" data-name="dot-6-8" data-project-title="'.  $scores['m2']['6-tra'][7]['title'] .'" cx="'.  $scores['m2']['6-tra'][7]['circle'] .'" cy="'.  $scores['m2']['6-tra'][7]['circle'] .'" r="'.  $scores['m2']['6-tra'][7]['circle'] .'" transform="translate(447 132.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-9)">
              <circle id="dot-6-9-2" data-name="dot-6-9" data-project-title="'.  $scores['m2']['6-tra'][8]['title'] .'" cx="'.  $scores['m2']['6-tra'][8]['circle'] .'" cy="'.  $scores['m2']['6-tra'][8]['circle'] .'" r="'.  $scores['m2']['6-tra'][8]['circle'] .'" transform="translate(481 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-10)">
              <circle id="dot-6-10-2" data-name="dot-6-10" data-project-title="'.  $scores['m2']['6-tra'][9]['title'] .'" cx="'.  $scores['m2']['6-tra'][9]['circle'] .'" cy="'.  $scores['m2']['6-tra'][9]['circle'] .'" r="'.  $scores['m2']['6-tra'][9]['circle'] .'" transform="translate(498 132.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-11)">
              <circle id="dot-6-11-2" data-name="dot-6-11" data-project-title="'.  $scores['m2']['6-tra'][10]['title'] .'" cx="'.  $scores['m2']['6-tra'][10]['circle'] .'" cy="'.  $scores['m2']['6-tra'][10]['circle'] .'" r="'.  $scores['m2']['6-tra'][10]['circle'] .'" transform="translate(481 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-12)">
              <circle id="dot-6-12-2" data-name="dot-6-12" data-project-title="'.  $scores['m2']['6-tra'][11]['title'] .'" cx="'.  $scores['m2']['6-tra'][11]['circle'] .'" cy="'.  $scores['m2']['6-tra'][11]['circle'] .'" r="'.  $scores['m2']['6-tra'][11]['circle'] .'" transform="translate(447 149.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-13)">
              <circle id="dot-6-13-2" data-name="dot-6-13" data-project-title="'.  $scores['m2']['6-tra'][12]['title'] .'" cx="'.  $scores['m2']['6-tra'][12]['circle'] .'" cy="'.  $scores['m2']['6-tra'][12]['circle'] .'" r="'.  $scores['m2']['6-tra'][12]['circle'] .'" transform="translate(447 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-14)">
              <circle id="dot-6-14-2" data-name="dot-6-14" data-project-title="'.  $scores['m2']['6-tra'][13]['title'] .'" cx="'.  $scores['m2']['6-tra'][13]['circle'] .'" cy="'.  $scores['m2']['6-tra'][13]['circle'] .'" r="'.  $scores['m2']['6-tra'][13]['circle'] .'" transform="translate(498 115.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-15)">
              <circle id="dot-6-15-2" data-name="dot-6-15" data-project-title="'.  $scores['m2']['6-tra'][14]['title'] .'" cx="'.  $scores['m2']['6-tra'][14]['circle'] .'" cy="'.  $scores['m2']['6-tra'][14]['circle'] .'" r="'.  $scores['m2']['6-tra'][14]['circle'] .'" transform="translate(498 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2488.96)" filter="url(#dot-6-16)">
              <circle id="dot-6-16-2" data-name="dot-6-16" data-project-title="'.  $scores['m2']['6-tra'][15]['title'] .'" cx="'.  $scores['m2']['6-tra'][15]['circle'] .'" cy="'.  $scores['m2']['6-tra'][15]['circle'] .'" r="'.  $scores['m2']['6-tra'][15]['circle'] .'" transform="translate(447 166.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-6" class="'. $hide_cluster6 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126-6" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -449.3, -129.84)" filter="url(#Ellisse_53-6)">
              </g>
              <circle id="Ellisse_53-15" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_06" data-name="06" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['6-tra']) .'</tspan></text>
          </g>
        </g>
        <g id="data-facet-7" transform="translate(251 55)">
          <g id="data-dots-7" class="'. $hide_datafacet7 .'">
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-1)">
              <circle id="dot-7-1-2" data-name="dot-7-1" data-project-title="'.  $scores['m2']['7-dis'][0]['title'] .'" cx="'.  $scores['m2']['7-dis'][0]['circle'] .'" cy="'.  $scores['m2']['7-dis'][0]['circle'] .'" r="'.  $scores['m2']['7-dis'][0]['circle'] .'" transform="translate(464 238.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-2)">
              <circle id="dot-7-2-2" data-name="dot-7-2" data-project-title="'.  $scores['m2']['7-dis'][1]['title'] .'" cx="'.  $scores['m2']['7-dis'][1]['circle'] .'" cy="'.  $scores['m2']['7-dis'][1]['circle'] .'" r="'.  $scores['m2']['7-dis'][1]['circle'] .'" transform="translate(481 255.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-3)">
              <circle id="dot-7-3-2" data-name="dot-7-3" data-project-title="'.  $scores['m2']['7-dis'][2]['title'] .'" cx="'.  $scores['m2']['7-dis'][2]['circle'] .'" cy="'.  $scores['m2']['7-dis'][2]['circle'] .'" r="'.  $scores['m2']['7-dis'][2]['circle'] .'" transform="translate(481 238.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-4)">
              <circle id="dot-7-4-2" data-name="dot-7-4" data-project-title="'.  $scores['m2']['7-dis'][3]['title'] .'" cx="'.  $scores['m2']['7-dis'][3]['circle'] .'" cy="'.  $scores['m2']['7-dis'][3]['circle'] .'" r="'.  $scores['m2']['7-dis'][3]['circle'] .'" transform="translate(464 255.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-5)">
              <circle id="dot-7-5-2" data-name="dot-7-5" data-project-title="'.  $scores['m2']['7-dis'][4]['title'] .'" cx="'.  $scores['m2']['7-dis'][4]['circle'] .'" cy="'.  $scores['m2']['7-dis'][4]['circle'] .'" r="'.  $scores['m2']['7-dis'][4]['circle'] .'" transform="translate(464 221.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-6)">
              <circle id="dot-7-6-2" data-name="dot-7-6" data-project-title="'.  $scores['m2']['7-dis'][5]['title'] .'" cx="'.  $scores['m2']['7-dis'][5]['circle'] .'" cy="'.  $scores['m2']['7-dis'][5]['circle'] .'" r="'.  $scores['m2']['7-dis'][5]['circle'] .'" transform="translate(498 255.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-7)">
              <circle id="dot-7-7-2" data-name="dot-7-7" data-project-title="'.  $scores['m2']['7-dis'][6]['title'] .'" cx="'.  $scores['m2']['7-dis'][6]['circle'] .'" cy="'.  $scores['m2']['7-dis'][6]['circle'] .'" r="'.  $scores['m2']['7-dis'][6]['circle'] .'" transform="translate(464 272.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-8)">
              <circle id="dot-7-8-2" data-name="dot-7-8" data-project-title="'.  $scores['m2']['7-dis'][7]['title'] .'" cx="'.  $scores['m2']['7-dis'][7]['circle'] .'" cy="'.  $scores['m2']['7-dis'][7]['circle'] .'" r="'.  $scores['m2']['7-dis'][7]['circle'] .'" transform="translate(447 238.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-9)">
              <circle id="dot-7-9-2" data-name="dot-7-9" data-project-title="'.  $scores['m2']['7-dis'][8]['title'] .'" cx="'.  $scores['m2']['7-dis'][8]['circle'] .'" cy="'.  $scores['m2']['7-dis'][8]['circle'] .'" r="'.  $scores['m2']['7-dis'][8]['circle'] .'" transform="translate(481 221.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-10)">
              <circle id="dot-7-10-2" data-name="dot-7-10" data-project-title="'.  $scores['m2']['7-dis'][9]['title'] .'" cx="'.  $scores['m2']['7-dis'][9]['circle'] .'" cy="'.  $scores['m2']['7-dis'][9]['circle'] .'" r="'.  $scores['m2']['7-dis'][9]['circle'] .'" transform="translate(498 238.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-11)">
              <circle id="dot-7-11-2" data-name="dot-7-11" data-project-title="'.  $scores['m2']['7-dis'][10]['title'] .'" cx="'.  $scores['m2']['7-dis'][10]['circle'] .'" cy="'.  $scores['m2']['7-dis'][10]['circle'] .'" r="'.  $scores['m2']['7-dis'][10]['circle'] .'" transform="translate(481 272.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-12)">
              <circle id="dot-7-12-2" data-name="dot-7-12" data-project-title="'.  $scores['m2']['7-dis'][11]['title'] .'" cx="'.  $scores['m2']['7-dis'][11]['circle'] .'" cy="'.  $scores['m2']['7-dis'][11]['circle'] .'" r="'.  $scores['m2']['7-dis'][11]['circle'] .'" transform="translate(447 255.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-13)">
              <circle id="dot-7-13-2" data-name="dot-7-13" data-project-title="'.  $scores['m2']['7-dis'][12]['title'] .'" cx="'.  $scores['m2']['7-dis'][12]['circle'] .'" cy="'.  $scores['m2']['7-dis'][12]['circle'] .'" r="'.  $scores['m2']['7-dis'][12]['circle'] .'" transform="translate(447 221.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-14)">
              <circle id="dot-7-14-2" data-name="dot-7-14" data-project-title="'.  $scores['m2']['7-dis'][13]['title'] .'" cx="'.  $scores['m2']['7-dis'][13]['circle'] .'" cy="'.  $scores['m2']['7-dis'][13]['circle'] .'" r="'.  $scores['m2']['7-dis'][13]['circle'] .'" transform="translate(498 221.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-15)">
              <circle id="dot-7-15-2" data-name="dot-7-15" data-project-title="'.  $scores['m2']['7-dis'][14]['title'] .'" cx="'.  $scores['m2']['7-dis'][14]['circle'] .'" cy="'.  $scores['m2']['7-dis'][14]['circle'] .'" r="'.  $scores['m2']['7-dis'][14]['circle'] .'" transform="translate(498 272.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 4915.5, 2382.96)" filter="url(#dot-7-16)">
              <circle id="dot-7-16-2" data-name="dot-7-16" data-project-title="'.  $scores['m2']['7-dis'][15]['title'] .'" cx="'.  $scores['m2']['7-dis'][15]['circle'] .'" cy="'.  $scores['m2']['7-dis'][15]['circle'] .'" r="'.  $scores['m2']['7-dis'][15]['circle'] .'" transform="translate(447 272.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-7" class="'. $hide_cluster7 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126-7" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -449.3, -235.84)" filter="url(#Ellisse_53-7)">
              </g>
              <circle id="Ellisse_53-16" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_07" data-name="07" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['7-dis']) .'</tspan></text>
          </g>
        </g>
        <g id="data-facet-8" transform="translate(85 55)">
          <g id="data-dots-8" class="'. $hide_datafacet8 .'">
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-1)">
              <circle id="dot-8-1-2" data-name="dot-8-1" data-project-title="'.  $scores['m2']['8-opt'][0]['title'] .'" cx="'.  $scores['m2']['8-opt'][0]['circle'] .'" cy="'.  $scores['m2']['8-opt'][0]['circle'] .'" r="'.  $scores['m2']['8-opt'][0]['circle'] .'" transform="translate(298 238.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-2)">
              <circle id="dot-8-2-2" data-name="dot-8-2" data-project-title="'.  $scores['m2']['8-opt'][1]['title'] .'" cx="'.  $scores['m2']['8-opt'][1]['circle'] .'" cy="'.  $scores['m2']['8-opt'][1]['circle'] .'" r="'.  $scores['m2']['8-opt'][1]['circle'] .'" transform="translate(315 255.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-3)">
              <circle id="dot-8-3-2" data-name="dot-8-3" data-project-title="'.  $scores['m2']['8-opt'][2]['title'] .'" cx="'.  $scores['m2']['8-opt'][2]['circle'] .'" cy="'.  $scores['m2']['8-opt'][2]['circle'] .'" r="'.  $scores['m2']['8-opt'][2]['circle'] .'" transform="translate(315 238.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-4)">
              <circle id="dot-8-4-2" data-name="dot-8-4" data-project-title="'.  $scores['m2']['8-opt'][3]['title'] .'" cx="'.  $scores['m2']['8-opt'][3]['circle'] .'" cy="'.  $scores['m2']['8-opt'][3]['circle'] .'" r="'.  $scores['m2']['8-opt'][3]['circle'] .'" transform="translate(298 255.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-5)">
              <circle id="dot-8-5-2" data-name="dot-8-5" data-project-title="'.  $scores['m2']['8-opt'][4]['title'] .'" cx="'.  $scores['m2']['8-opt'][4]['circle'] .'" cy="'.  $scores['m2']['8-opt'][4]['circle'] .'" r="'.  $scores['m2']['8-opt'][4]['circle'] .'" transform="translate(298 221.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-6)">
              <circle id="dot-8-6-2" data-name="dot-8-6" data-project-title="'.  $scores['m2']['8-opt'][5]['title'] .'" cx="'.  $scores['m2']['8-opt'][5]['circle'] .'" cy="'.  $scores['m2']['8-opt'][5]['circle'] .'" r="'.  $scores['m2']['8-opt'][5]['circle'] .'" transform="translate(332 255.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-7)">
              <circle id="dot-8-7-2" data-name="dot-8-7" data-project-title="'.  $scores['m2']['8-opt'][6]['title'] .'" cx="'.  $scores['m2']['8-opt'][6]['circle'] .'" cy="'.  $scores['m2']['8-opt'][6]['circle'] .'" r="'.  $scores['m2']['8-opt'][6]['circle'] .'" transform="translate(298 272.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-8)">
              <circle id="dot-8-8-2" data-name="dot-8-8" data-project-title="'.  $scores['m2']['8-opt'][7]['title'] .'" cx="'.  $scores['m2']['8-opt'][7]['circle'] .'" cy="'.  $scores['m2']['8-opt'][7]['circle'] .'" r="'.  $scores['m2']['8-opt'][7]['circle'] .'" transform="translate(281 238.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-9)">
              <circle id="dot-8-9-2" data-name="dot-8-9" data-project-title="'.  $scores['m2']['8-opt'][8]['title'] .'" cx="'.  $scores['m2']['8-opt'][8]['circle'] .'" cy="'.  $scores['m2']['8-opt'][8]['circle'] .'" r="'.  $scores['m2']['8-opt'][8]['circle'] .'" transform="translate(315 221.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-10)">
              <circle id="dot-8-10-2" data-name="dot-8-10" data-project-title="'.  $scores['m2']['8-opt'][9]['title'] .'" cx="'.  $scores['m2']['8-opt'][9]['circle'] .'" cy="'.  $scores['m2']['8-opt'][9]['circle'] .'" r="'.  $scores['m2']['8-opt'][9]['circle'] .'" transform="translate(332 238.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-11)">
              <circle id="dot-8-11-2" data-name="dot-8-11" data-project-title="'.  $scores['m2']['8-opt'][10]['title'] .'" cx="'.  $scores['m2']['8-opt'][10]['circle'] .'" cy="'.  $scores['m2']['8-opt'][10]['circle'] .'" r="'.  $scores['m2']['8-opt'][10]['circle'] .'" transform="translate(315 272.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-12)">
              <circle id="dot-8-12-2" data-name="dot-8-12" data-project-title="'.  $scores['m2']['8-opt'][11]['title'] .'" cx="'.  $scores['m2']['8-opt'][11]['circle'] .'" cy="'.  $scores['m2']['8-opt'][11]['circle'] .'" r="'.  $scores['m2']['8-opt'][11]['circle'] .'" transform="translate(281 255.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-13)">
              <circle id="dot-8-13-2" data-name="dot-8-13" data-project-title="'.  $scores['m2']['8-opt'][12]['title'] .'" cx="'.  $scores['m2']['8-opt'][12]['circle'] .'" cy="'.  $scores['m2']['8-opt'][12]['circle'] .'" r="'.  $scores['m2']['8-opt'][12]['circle'] .'" transform="translate(281 221.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-14)">
              <circle id="dot-8-14-2" data-name="dot-8-14" data-project-title="'.  $scores['m2']['8-opt'][13]['title'] .'" cx="'.  $scores['m2']['8-opt'][13]['circle'] .'" cy="'.  $scores['m2']['8-opt'][13]['circle'] .'" r="'.  $scores['m2']['8-opt'][13]['circle'] .'" transform="translate(332 221.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-15)">
              <circle id="dot-8-15-2" data-name="dot-8-15" data-project-title="'.  $scores['m2']['8-opt'][14]['title'] .'" cx="'.  $scores['m2']['8-opt'][14]['circle'] .'" cy="'.  $scores['m2']['8-opt'][14]['circle'] .'" r="'.  $scores['m2']['8-opt'][14]['circle'] .'" transform="translate(332 272.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5081.5, 2382.96)" filter="url(#dot-8-16)">
              <circle id="dot-8-16-2" data-name="dot-8-16" data-project-title="'.  $scores['m2']['8-opt'][15]['title'] .'" cx="'.  $scores['m2']['8-opt'][15]['circle'] .'" cy="'.  $scores['m2']['8-opt'][15]['circle'] .'" r="'.  $scores['m2']['8-opt'][15]['circle'] .'" transform="translate(281 272.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-8" class="'. $hide_cluster8 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126-8" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -283.3, -235.84)" filter="url(#Ellisse_53-8)">
              </g>
              <circle id="Ellisse_53-17" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_08" data-name="08" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['8-opt']) .'</tspan></text>
          </g>
        </g>
        <g id="data-facet-9" transform="translate(166)">
          <g id="data-dots-9" class="'. $hide_datafacet9 .'">
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-1)">
              <circle id="dot-9-1-2" data-name="dot-9-1" data-project-title="'.  $scores['m2']['9-mix'][0]['title'] .'" cx="'.  $scores['m2']['9-mix'][0]['circle'] .'" cy="'.  $scores['m2']['9-mix'][0]['circle'] .'" r="'.  $scores['m2']['9-mix'][0]['circle'] .'" transform="translate(379 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-2)">
              <circle id="dot-9-2-2" data-name="dot-9-2" data-project-title="'.  $scores['m2']['9-mix'][1]['title'] .'" cx="'.  $scores['m2']['9-mix'][1]['circle'] .'" cy="'.  $scores['m2']['9-mix'][1]['circle'] .'" r="'.  $scores['m2']['9-mix'][1]['circle'] .'" transform="translate(396 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-3)">
              <circle id="dot-9-3-2" data-name="dot-9-3" data-project-title="'.  $scores['m2']['9-mix'][2]['title'] .'" cx="'.  $scores['m2']['9-mix'][2]['circle'] .'" cy="'.  $scores['m2']['9-mix'][2]['circle'] .'" r="'.  $scores['m2']['9-mix'][2]['circle'] .'" transform="translate(396 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-4)">
              <circle id="dot-9-4-2" data-name="dot-9-4" data-project-title="'.  $scores['m2']['9-mix'][3]['title'] .'" cx="'.  $scores['m2']['9-mix'][3]['circle'] .'" cy="'.  $scores['m2']['9-mix'][3]['circle'] .'" r="'.  $scores['m2']['9-mix'][3]['circle'] .'" transform="translate(379 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-5)">
              <circle id="dot-9-5-2" data-name="dot-9-5" data-project-title="'.  $scores['m2']['9-mix'][4]['title'] .'" cx="'.  $scores['m2']['9-mix'][4]['circle'] .'" cy="'.  $scores['m2']['9-mix'][4]['circle'] .'" r="'.  $scores['m2']['9-mix'][4]['circle'] .'" transform="translate(379 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-6)">
              <circle id="dot-9-6-2" data-name="dot-9-6" data-project-title="'.  $scores['m2']['9-mix'][5]['title'] .'" cx="'.  $scores['m2']['9-mix'][5]['circle'] .'" cy="'.  $scores['m2']['9-mix'][5]['circle'] .'" r="'.  $scores['m2']['9-mix'][5]['circle'] .'" transform="translate(413 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-7)">
              <circle id="dot-9-7-2" data-name="dot-9-7" data-project-title="'.  $scores['m2']['9-mix'][6]['title'] .'" cx="'.  $scores['m2']['9-mix'][6]['circle'] .'" cy="'.  $scores['m2']['9-mix'][6]['circle'] .'" r="'.  $scores['m2']['9-mix'][6]['circle'] .'" transform="translate(379 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-8)">
              <circle id="dot-9-8-2" data-name="dot-9-8" data-project-title="'.  $scores['m2']['9-mix'][7]['title'] .'" cx="'.  $scores['m2']['9-mix'][7]['circle'] .'" cy="'.  $scores['m2']['9-mix'][7]['circle'] .'" r="'.  $scores['m2']['9-mix'][7]['circle'] .'" transform="translate(362 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-9)">
              <circle id="dot-9-9-2" data-name="dot-9-9" data-project-title="'.  $scores['m2']['9-mix'][8]['title'] .'" cx="'.  $scores['m2']['9-mix'][8]['circle'] .'" cy="'.  $scores['m2']['9-mix'][8]['circle'] .'" r="'.  $scores['m2']['9-mix'][8]['circle'] .'" transform="translate(396 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-10)">
              <circle id="dot-9-10-2" data-name="dot-9-10" data-project-title="'.  $scores['m2']['9-mix'][9]['title'] .'" cx="'.  $scores['m2']['9-mix'][9]['circle'] .'" cy="'.  $scores['m2']['9-mix'][9]['circle'] .'" r="'.  $scores['m2']['9-mix'][9]['circle'] .'" transform="translate(413 183.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-11)">
              <circle id="dot-9-11-2" data-name="dot-9-11" data-project-title="'.  $scores['m2']['9-mix'][10]['title'] .'" cx="'.  $scores['m2']['9-mix'][10]['circle'] .'" cy="'.  $scores['m2']['9-mix'][10]['circle'] .'" r="'.  $scores['m2']['9-mix'][10]['circle'] .'" transform="translate(396 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-12)">
              <circle id="dot-9-12-2" data-name="dot-9-12" data-project-title="'.  $scores['m2']['9-mix'][11]['title'] .'" cx="'.  $scores['m2']['9-mix'][11]['circle'] .'" cy="'.  $scores['m2']['9-mix'][11]['circle'] .'" r="'.  $scores['m2']['9-mix'][11]['circle'] .'" transform="translate(362 200.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-13)">
              <circle id="dot-9-13-2" data-name="dot-9-13" data-project-title="'.  $scores['m2']['9-mix'][12]['title'] .'" cx="'.  $scores['m2']['9-mix'][12]['circle'] .'" cy="'.  $scores['m2']['9-mix'][12]['circle'] .'" r="'.  $scores['m2']['9-mix'][12]['circle'] .'" transform="translate(362 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-14)">
              <circle id="dot-9-14-2" data-name="dot-9-14" data-project-title="'.  $scores['m2']['9-mix'][13]['title'] .'" cx="'.  $scores['m2']['9-mix'][13]['circle'] .'" cy="'.  $scores['m2']['9-mix'][13]['circle'] .'" r="'.  $scores['m2']['9-mix'][13]['circle'] .'" transform="translate(413 166.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-15)">
              <circle id="dot-9-15-2" data-name="dot-9-15" data-project-title="'.  $scores['m2']['9-mix'][14]['title'] .'" cx="'.  $scores['m2']['9-mix'][14]['circle'] .'" cy="'.  $scores['m2']['9-mix'][14]['circle'] .'" r="'.  $scores['m2']['9-mix'][14]['circle'] .'" transform="translate(413 217.54) rotate(90)" fill="#fff"/>
            </g>
            <g transform="matrix(1, 0, 0, 1, 5000.5, 2437.96)" filter="url(#dot-9-16)">
              <circle id="dot-9-16-2" data-name="dot-9-16" data-project-title="'.  $scores['m2']['9-mix'][15]['title'] .'" cx="'.  $scores['m2']['9-mix'][15]['circle'] .'" cy="'.  $scores['m2']['9-mix'][15]['circle'] .'" r="'.  $scores['m2']['9-mix'][15]['circle'] .'" transform="translate(362 217.54) rotate(90)" fill="#fff"/>
            </g>
          </g>
          <g id="cluster-9" class="'. $hide_cluster9 .'" transform="translate(-722.2 660.8)">
            <g id="Raggruppa_126-9" data-name="Raggruppa 126" transform="translate(6087 1958)">
              <g transform="matrix(1, 0, 0, 1, -364.3, -180.84)" filter="url(#Ellisse_53-9)">
              </g>
              <circle id="Ellisse_53-18" data-name="Ellisse 53" cx="17" cy="17" r="17" transform="translate(34.2 0.19) rotate(90)" fill="#fff"/>
            </g>
            <text id="_09" data-name="09" transform="translate(6093.149 1982.255)" fill="#605f5f" font-size="20" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">'.  count($scores['m2']['9-mix']) .'</tspan></text>
          </g>
        </g>
      </g>
      <text id="ANTICIPATORY" transform="translate(7215 3759.295)" fill="#dc4aff" font-size="12" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="0" y="0">ANTICIPATORY</tspan></text>
      <text id="ENHANCEMENT-_ORIENTED" data-name="ENHANCEMENT-
  ORIENTED" transform="translate(6627 3750.295)" fill="#dc4aff" font-size="12" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="-90.328" y="0">ENHANCEMENT-</tspan><tspan x="-56.203" y="14">ORIENTED</tspan></text>
      <text id="MISSION-ORIENTED" transform="translate(6920 3564.295)" fill="#dc4aff" font-size="12" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="-54.354" y="0">MISSION-ORIENTED</tspan></text>
      <text id="ADAPTIVE" transform="translate(6920 3945.295)" fill="#dc4aff" font-size="12" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="-28.289" y="0">ADAPTIVE</tspan></text>
      <text id="SUSTAINING" transform="translate(6741.593 3640.49) rotate(37)" fill="#9ec5e0" font-size="12" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="-34.427" y="0">SUSTAINING</tspan></text>
      <text id="DISRUPTIVE" transform="matrix(0.799, 0.602, -0.602, 0.799, 7089.593, 3873.49)" fill="#9ec5e0" font-size="12" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="-33.334" y="0">DISRUPTIVE</tspan></text>
      <text id="TRASFORMATIVE" transform="matrix(0.788, -0.616, 0.616, 0.788, 7104.463, 3632.447)" fill="#9ec5e0" font-size="12" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="-47.739" y="0">TRASFORMATIVE</tspan></text>
      <text id="OPTIMISING" transform="matrix(0.788, -0.616, 0.616, 0.788, 6747.463, 3875.447)" fill="#9ec5e0" font-size="12" font-family="lato,Roboto-Medium, Roboto" font-weight="500"><tspan x="-33.917" y="0">OPTIMISING</tspan></text>
    </g>
  </svg>
	';
	$mod2_file_input_path = $upload_path.'/mod2diamond-'.$post->ID.'.svg';
	$mod2_file_output_path = $upload_path.'/mod2diamond-'.$post->ID.'.png';
	$handle_mod2 = file_put_contents( $mod2_file_input_path, $mod2_diamond );
	exec("inkscape $mod2_file_input_path --export-png $mod2_file_output_path");
	$mod2_file_output_url = $upload_dir['baseurl'].'/pat-temp/mod2diamond-'.$post->ID.'.png';
	// If module 2 is completed, the project mapping diamond should be the featured image of the post
	// $mod2_file_output_url = get_the_post_thumbnail_url( $post->ID, 'full' );

	// Module 2 comparison - diamond 1
	$mod2d1_diamond = '
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="590" height="368.75" viewBox="0 0 280.16 175.45"> <defs> <style>.small-diam-1-a{fill: #e6e8f0;}.small-diam-1-b{fill: '. $scores['enh_color'] .';}.small-diam-1-c{fill: '. $scores['mis_color'] .';}.small-diam-1-d{fill: '. $scores['ada_color'] .';}.small-diam-1-e{fill: '. $scores['ant_color'] .';}.small-diam-1-f{fill: #fff; font-size: 14px; font-family: Roboto-Medium, Roboto, lato, sans-serif; font-weight: 500;}.small-diam-1-g{filter: url(#small-diam-1-g);}.small-diam-1-h{filter: url(#small-diam-1-e);}.small-diam-1-i{filter: url(#small-diam-1-c);}.small-diam-1-j{filter: url(#small-diam-1-a);}</style> <filter id="small-diam-1-a" x="23.125" y="53.648" width="114.062" height="73.719" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="b"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="b"/> <feComposite in="SourceGraphic"/> </filter> <filter id="small-diam-1-c" x="83.727" y="13.556" width="114.062" height="73.719" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="d"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="d"/> <feComposite in="SourceGraphic"/> </filter> <filter id="small-diam-1-e" x="83.727" y="93.284" width="114.062" height="73.719" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="f"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="f"/> <feComposite in="SourceGraphic"/> </filter> <filter id="small-diam-1-g" x="144.785" y="53.648" width="114.062" height="73.719" filterUnits="userSpaceOnUse"> <feOffset dy="3" input="SourceAlpha"/> <feGaussianBlur stdDeviation="1.5" result="h"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="h"/> <feComposite in="SourceGraphic"/> </filter> </defs> <g transform="translate(-168 -2827.272)"> <path class="small-diam-1-a" d="M2580.007,3419.947l139.943-87,140.218,87L2719.95,3508.4Z" transform="translate(-2412.007 -505.673)"/> <g class="small-diam-1-j" transform="matrix(1, 0, 0, 1, 168, 2827.27)"> <path class="small-diam-1-b" d="M648.3,1393.587l-52.531,32.132-52.531-32.132L595.773,1361Z" transform="translate(-515.62 -1305.85)"/> </g> <g transform="translate(256.227 2842.328)"> <g class="small-diam-1-i" transform="matrix(1, 0, 0, 1, -88.23, -15.06)"> <path class="small-diam-1-c" d="M770.3,1316.587l-52.531,32.132-52.531-32.132L717.773,1284Z" transform="translate(-577.01 -1268.94)"/> </g> </g> <g class="small-diam-1-h" transform="matrix(1, 0, 0, 1, 168, 2827.27)"> <path class="small-diam-1-d" d="M770.3,1469.587l-52.531,32.131-52.531-32.131L717.773,1437Z" transform="translate(-577.01 -1342.22)"/> </g> <g class="small-diam-1-g" transform="matrix(1, 0, 0, 1, 168, 2827.27)"> <path class="small-diam-1-e" d="M893.3,1393.587l-52.531,32.132-52.531-32.132L840.773,1361Z" transform="translate(-638.96 -1305.85)"/> </g><text class="small-diam-1-f" transform="translate(307.832 2878.805)"> <tspan x="-13.098" y="0">'. $scores['mis_percentage'] .'%</tspan> </text><text class="small-diam-1-f" transform="translate(309.832 2958.975)"> <tspan x="-13.098" y="0">'. $scores['ada_percentage'] .'%</tspan> </text><text class="small-diam-1-f" transform="translate(371.582 2919.667)"> <tspan x="-13.098" y="0">'. $scores['ant_percentage'] .'%</tspan> </text><text class="small-diam-1-f" transform="translate(248.082 2917.604)"> <tspan x="-13.098" y="0">'. $scores['enh_percentage'] .'%</tspan> </text> </g></svg>
	';
	$mod2d1_file_input_path = $upload_path.'/mod2d1diamond-'.$post->ID.'.svg';
	$mod2d1_file_output_path = $upload_path.'/mod2d1diamond-'.$post->ID.'.png';
	$handle_mod2d1 = file_put_contents( $mod2d1_file_input_path, $mod2d1_diamond );
	exec("inkscape $mod2d1_file_input_path --export-png $mod2d1_file_output_path");
	$mod2d1_file_output_url = $upload_dir['baseurl'].'/pat-temp/mod2d1diamond-'.$post->ID.'.png';

	ob_start();
	?>

	<div class="col-md-12 pat-results-hero">
          	<div class="single_img_wrap pat-form-banner">
          		<img src="<?php echo site_url() ?>/wp-content/plugins/portfolio-assessment-tool-custom-plugin/assets/images/pat-hero-pdf.jpg" class="attachment-blog size-blog wp-post-image" alt="Portfolio Exploration Results">
          	</div>
          </div>
					<pagebreak>

	<section id="introduction">

                <div class="pat-results-content">

									<div id="page1">
										<div class="pat-results-main-title">
											<h2>Innovation portfolio balance of <?php echo $organisation ?></h2>
											<p class="subtitle">Based on exploration by <?php echo $name ?> on <?php echo $submission_date ?></p>
										</div>

										<div class="disclaimer"><?php echo get_field( 'disclaimer_text', 'option' ) ?></div>
									</div>
									<pagebreak>

									<div id="page2">
										<!-- Diamond 1 -->
										<div class="diamond diamond-1">
											<img src="<?php echo $d1_file_output_url ?>" alt="">
										</div>

										<h3 class="page3-portfolio-statement">Your organisational portfolio tends to <?php echo $scores['portfolio_tendency_statement'] ?></h3>
									</div>

                </div>

              </section>
							<pagebreak>

              <section id="organisational-portfolio-balance" class="pat-results-fullwidth-section">

                <div class="pat-results-row enh-row">

                  <div class="pat-results-content">

										<h2 class="section-title">Innovation portfolio balance of <strong><?php echo $organisation ?></strong></h2>

                    <div class="enhancement-inno-section">
                      <!-- diamond with enhancement percentage   -->
                      <div class="facet-diamond enh-diamond">
                        <img src="<?php echo $d2_file_output_url ?>" alt="">
                      </div>

                      <?php the_field( 'enhancemnet_oriented_innovation_text', 'option' ); ?>
                    </div>

                  </div>
                </div>
								<pagebreak>

                <div class="pat-results-row mis-row">

                  <div class="pat-results-content">
										<h2 class="section-title">Innovation portfolio balance of <strong><?php echo $organisation ?></strong></h2>
                    <div class="mission-inno-section">
                      <div class="facet-diamond mis-diamond">
												<img src="<?php echo $d3_file_output_url ?>" alt="">
                      </div>
                      <?php the_field( 'mission_oriented_innovation_text', 'option' ); ?>
                    </div>
                  </div>

                </div>
								<pagebreak>

                <div class="pat-results-row ada-row">

                  <div class="pat-results-content">

										<h2 class="section-title">Innovation portfolio balance of <strong><?php echo $organisation ?></strong></h2>

                    <div class="adaptive-inno-section">
                      <div class="facet-diamond ada-diamond">
                        <img src="<?php echo $d4_file_output_url ?>" alt="">
                      </div>
                      <?php the_field( 'adaptive_oriented_innovation_text', 'option' ); ?>
                    </div>
                  </div>

                </div>
								<pagebreak>

                <div class="pat-results-row ant-row">

                  <div class="pat-results-content">
										<h2 class="section-title">Innovation portfolio balance of <strong><?php echo $organisation ?></strong></h2>
                    <div class="anticipatory-inno-section">
                      <div class="facet-diamond ant-diamond">
                        <img src="<?php echo $d5_file_output_url ?>" alt="">
                      </div>
                      <?php the_field( 'anticipatory_oriented_innovation_text_', 'option' ); ?>
                    </div>
                  </div>

                </div>
								<pagebreak>

                <div class="pat-results-row tendency-row">

                  <div class="pat-results-content">

                    <div class="tendency-group">

                      <h2 class="section-title">This organisation’s portfolio tends to <?php echo $scores['portfolio_tendency_statement'] ?>.</h2>

                      <?php echo $scores['portfolio_tendency_group_text'] ?>

                    </div>

                  </div>

                </div>

              </section>
							<pagebreak>

              <section id="portfolio-management-capability" class="pat-results-fullwidth-section">

                <div class="pat-results-row">

                  <div class="pat-results-content">

                    <h2 class="section-title">This organisation’s tends to have <?php echo $scores['level'] ?> portfolio management capablity</h2>

                    <div class="balance-graph">
                    <?php
                    if ( $scores['level'] == 'low' ) {
                      ?>
                      <img src="<?php echo site_url() ?>/wp-content/plugins/portfolio-assessment-tool-custom-plugin/assets/images/balance-low.png" alt="">
                      <?php
                    } elseif ( $scores['level'] == 'medium' ) {
                      ?>
                      <img src="<?php echo site_url() ?>/wp-content/plugins/portfolio-assessment-tool-custom-plugin/assets/images/balance-mid.png" alt="">
                      <?php
                    } else {
                      ?>
                      <img src="<?php echo site_url() ?>/wp-content/plugins/portfolio-assessment-tool-custom-plugin/assets/images/balance-high.png" alt="">
                      <?php
                    }
                    ?>
                    </div>

										<div class="pmc-text">
                    <?php the_field( 'portfolio_management_capability_text', 'option' ); ?>
										</div>

                  </div>

                </div>


              </section>
							<pagebreak>

							<?php
              $post_status = get_post_status_object( get_post_status( $post->ID ) );
            	$status_slug = $post_status->name;
            	if( $status_slug == 'publish_module2' ) :
               ?>
              <section id="module-2" class="pat-results-fullwidth-section">
								<div id="m2-page1">
									<h2 class="section-title">Project Based Mapping of <?php echo $organisation ?><br/>Based on exploration by <?php echo $name ?> on <?php echo $submission_date ?></h2>
									<div class="module-2-intro-text">
										<?php the_field( 'm2_lead_in_text', 'option' ); ?>
									</div>
									<pagebreak>
									<div class="module-2-graph-container">
										<img src="<?php echo $mod2_file_output_url ?>" alt="">
									</div>
								</div>
                <div class="module-2-lists-container row">
                  <?php
                  foreach ($scores['m2'] as $key => $value) {
                    $list_title = '';
                    // Determine list title
                    switch ($key) {
                      case '1-enh':
                        $list_title = 'Enhancement-oriented';
                        break;
                      case '2-mis':
                        $list_title = 'Mission-oriented';
                        break;
                      case '3-ant':
                        $list_title = 'Anticipatory';
                        break;
                      case '4-ada':
                        $list_title = 'Adaptive';
                        break;
                      case '5-sus':
                        $list_title = 'Sustaining change';
                        break;
                      case '6-tra':
                        $list_title = 'Transformative change';
                        break;
                      case '7-dis':
                        $list_title = 'Disruptive change';
                        break;
                      case '8-opt':
                        $list_title = 'Optimising change';
                        break;
                      case '9-mix':
                        $list_title = 'Mixed or unclear';
                        break;
                      default:
                        $list_title = '';
                        break;
                    }
										$primary_lists = array( 'Enhancement-oriented', 'Mission-oriented', 'Anticipatory', 'Adaptive');
                    $title_class="";
                    if( in_array( $list_title, $primary_lists ) ) {
                      $title_class="primary_title";
                    }
                    if( count($scores['m2'][$key]) > 0 ) {
                      echo '<div class="col-sm-3 projects-list">';
                      echo '<h3 class="projects-list-title '.$title_class.'">'. $list_title .'</h3>';
                      echo '<ul>';
                      foreach ($scores['m2'][$key] as $i => $project) {
                        echo '<li class="priority-'.$project['priority'].'">'. $project['title'] .' ('.$project['priority'].')</li>';
                      }
                      echo '</ul></div>';
                    }
                  }
                  ?>
                </div>
								<pagebreak>
                <div class="modules-graphs-comparison row">
									<h2 class="section-title">Combined Results</h2>
                  <div class="col-sm-6">
                    <h3>Organisational Capacities</h3>
                    <img src="<?php echo $mod2d1_file_output_url ?>" alt="">
                  </div>
                  <div class="col-sm-6">
                    <h3>Project Portfolio</h3>
                    <img src="<?php echo $mod2_file_output_url ?>" alt="">
                  </div>
									<div class="module-2-combined-text">
                    <?php echo get_field( 'combined_results_text', 'option' ); ?>
                  </div>
                </div>
              </section>
              <?php endif; ?>

							<section id="how-to-use-results">
								<h2>How you might use these results</h2>
								<?php the_field( 'how_you_might_use_these_result_text', 'option' ) ?>
							</section>

							<section id="how-to-use-results">
								<h2>Contact OPSI for help with interpretation</h2>
								<?php the_field( 'contact_OPSI_for_help_with_interpretation_text', 'option' ) ?>
							</section>


	<?php
	$pdf_output = ob_get_contents();
	ob_end_clean();

?>
