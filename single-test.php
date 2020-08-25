<?php

$data_faq = get_field('faq_list'); /*repeater field*/
if($data_faq){
	$numItems = count($data_faq);
}
if($data_faq){ echo '<script type="application/ld+json">'.'{"@context": "https://schema.org",'.'"@type": "FAQPage",'.'"mainEntity": [';
	$i = 0;
	while ( have_rows('faq_list') ){ the_row();

	$question = '"@type": "Question","name":' . '"'. get_sub_field('question') .'",';
	$answer = '"acceptedAnswer": {"@type": "Answer","text":'. '"'. esc_html(get_sub_field('answer')) . '"}';
	/*checking the last item*/
	if(++$i === $numItems) { echo '{' . $question . $answer .'}'; }
	else{ echo '{' . $question . $answer .'},'; }
                    
	}

echo ']}</script>'; 

}else{

}
?>
