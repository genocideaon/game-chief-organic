<div style="position: fixed; top: 0; left: 0; right: 0; z-index: 999; background: rgba(0, 0, 0, 0.5); overflow: hidden; display:none">
	<button id="remove" style="margin: 15px;">remove</button>
	<button id="play" style="margin: 15px;">play</button>
	
</div>

<script src="web-js/jquery-1.11.2.min.js"></script>
<script src="web-js/velocity.min.js"></script>
<script src="web-js/jquery.bxslider/jquery.bxslider.js"></script>

<script>
$(document).ready(function () {
	$(window).load(function () {
		$('#remove').on('click', function () {
			
		});

		$('#play').on('click', function () {
			
		});

		/**
		**
		=Animate home page
		**
		**/
		if($('#homePage').length){
			$('.cloud-main').addClass('active');
			$('.character-wrapper').addClass('active');
		}

		/**
		**
		=Animate Hub page
		**
		**/
		if($('#hubPage').length){
			setTimeout(function(){
				$('#shelf').addClass('active');
			},600);
			$('.character-wrapper').addClass('active');
		}

		/**
		**
		=Animate Hub page
		**
		**/
		if($('#introduce').length){
			$('.cloud-main').addClass('active');
			$('.content-detail').addClass('active');
			$('.top-label').addClass('active');
			
		}

		/**
		**
		=Basket slide
		**
		**/
		var basketMeat = $('#basketMeat').show().bxSlider({
			infiniteLoop: false,
			controls: false,
			pager: false,
			minSlides: 3,
			maxSlides: 5,
			slideWidth: 230,
			slideMargin: 20
		});

		var basketVegetable = $('#basketVegetable').show().bxSlider({
			infiniteLoop: false,
			controls: false,
			pager: false,
			minSlides: 3,
			maxSlides: 5,
			slideWidth: 230,
			slideMargin: 20
		});

		var basketRice = $('#basketRice').show().bxSlider({
			infiniteLoop: false,
			controls: false,
			pager: false,
			minSlides: 3,
			maxSlides: 5,
			slideWidth: 230,
			slideMargin: 20
		});

		var basketEgg = $('#basketEgg').show().bxSlider({
			infiniteLoop: false,
			controls: false,
			pager: false,
			minSlides: 3,
			maxSlides: 3,
			slideWidth: 230,
			slideMargin: 40
		});
		
		$('#basketNext').on('click', function(){
			basketMeat.goToNextSlide();
			basketVegetable.goToNextSlide();
			basketRice.goToNextSlide();
			basketEgg.goToNextSlide();
		});

		$('#basketPrev').on('click', function(){
			basketMeat.goToPrevSlide();
			basketVegetable.goToPrevSlide();
			basketRice.goToPrevSlide();
			basketEgg.goToPrevSlide();
		});

		/**
		**
		=Select Basket
		**
		**/
		$('.layout-basket-slide-meat').css({transform: 'translateX(0)'});
		

		$('#basketMeat img').on('click', function(event){
			
			event.preventDefault();

			var targetDish = $('#dish1');
			var itemMaterial = $(this).data('material');

			$(this).next().attr('checked','checked');

			targetDish.addClass('active').html('<img class="material" src="web-images/meat-dish/'+itemMaterial+'.png">');

			$('.layout-basket-slide-meat').css({transform: 'translateY(200%)'});

			$('.layout-basket-slide-vegetable').css({transform: 'translateX(-5%)'});
			
			setTimeout(function(){
				$('.layout-basket-slide-vegetable').css({transform: 'translateX(0)'});
			},400);
			
			
		});

		$('#basketVegetable img').on('click', function(event){
			
			event.preventDefault();

			var targetDish = $('#dish2');
			var itemMaterial = $(this).data('material');

			$(this).next().attr('checked','checked');

			targetDish.addClass('active').html('<img class="material" src="web-images/vegetable-dish/'+itemMaterial+'.png">');

			$('.layout-basket-slide-vegetable').css({transform: 'translateY(200%)'});
			$('.layout-basket-slide-rice').css({transform: 'translateX(-5%)'});
			setTimeout(function(){
				$('.layout-basket-slide-rice').css({transform: 'translateX(0)'});
			},400);
		});

		$('#basketRice img').on('click', function(event){
			
			event.preventDefault();

			var targetDish = $('#dish3');
			var itemMaterial = $(this).data('material');

			$(this).next().attr('checked','checked');

			targetDish.addClass('active').html('<img class="material" src="web-images/rice-dish/'+itemMaterial+'.png">');
			

			$('.layout-basket-slide-rice').css({transform: 'translateY(200%)'});
			$('.layout-basket-slide-egg').css({transform: 'translateX(-5%)'});
			setTimeout(function(){
				$('.layout-basket-slide-egg').css({transform: 'translateX(0)'});
			},400);
		});

		$('#basketEgg img').on('click', function(event){
			
			event.preventDefault();

			var targetDish = $('#dish4');
			var itemMaterial = $(this).data('material');

			$(this).next().attr('checked','checked');

			targetDish.addClass('active').html('<img class="material" src="web-images/egg/'+itemMaterial+'.png">');

			$('.layout-basket-slide-egg').css({transform: 'translateY(200%)'});
			$('.layout-basket-slide-execute').css({transform: 'translateX(-5%)'});
			setTimeout(function(){
				$('.layout-basket-slide-execute').css({transform: 'translateX(0)'});
			},400);
		});

		/**
		**
		=Playing submit
		**
		**/
		$('#playingSubmit').on('click', function(e){
			e.preventDefault();

			$('.wrapper-material').addClass('wrapper-material-cooking');

			$('.table-cooking').addClass('active');

			setTimeout(function(){
				$('.light').addClass('light-cooking');
			}, 1800);

			setTimeout(function(){
				$('.layout-basket').submit();
			}, 3800);

			
		});

		/**
		**
		=Cooking
		**
		**/
		if($('#finishName').length){
			setTimeout(function(){
				$('.light-cooking-reverse').velocity({opacity: 0}, {complete: function(){ $(this).hide(); }});
				
			}, 300);

			$('.finish-food').addClass('active');
		}
	});
});
</script>