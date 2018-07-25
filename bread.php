<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a href="/" itemprop="item"><span itemprop="name">TOP</span></a><meta itemprop="position" content="1">
	</li>
	<?php if(is_single() || is_post_type_archive()): ?>
		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<a href="<?=home_url().'/'.get_post_type_object(get_post_type())->name?>" itemprop="item"><span itemprop="name"><?=get_post_type_object(get_post_type())->label?></span></a><meta itemprop="position" content="2">
		</li>
	<?php
		endif;
		if(is_home()):
	?>
		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<a href="" itemprop="item"><span itemprop="name">新着記事一覧</span></a><meta itemprop="position" content="2">
		</li>
	<?php
		endif;
		if(is_tax()):
	?>
		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<a href="" itemprop="item"><span itemprop="name"><?=$wp_query->queried_object->name?></span></a><meta itemprop="position" content="2">
		</li>
	<?php
		endif;
		if(is_single() || is_page()) {
			global $post;
			$pare = $post;
			$bread = array();
			for($i; true; $i++) {
				$bread[$i] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.get_permalink($pare).'" itemprop="item"><span itemprop="name">'.get_the_title().'</span></a><meta itemprop="position" content="';
				if($pare->post_parent===0 || $pare->post_parent===NULL)
					break;
				$pare = get_page($pare->post_parent);
			}
			$c=is_page() ? 2 : 3;
			foreach(array_reverse($bread) as $value) {
				echo $value.$c.'"></li>';
				$c++;
			}
		}
	?>
</ol>
