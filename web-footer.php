

<div class="please-rotate-phone">
	<div class="play-phone">
		<p>
			<img src="web-images/icon-phone.png" alt="" >
			<br><strong>กรุณาเล่นเกมนี้ในมุมมองแนวนอนของโทรศัพท์</strong>
		</p>
	</div>
</div>

<script src="web-js/jquery-1.11.2.min.js"></script>
<script src="web-js/velocity.min.js"></script>
<script src="web-js/jquery.bxslider/jquery.bxslider.js"></script>

<script>
$(document).ready(function () {
	$(window).load(function () {


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
		=Animate Play method
		**
		**/
		if($('#playMethod').length){
			$('.cloud-main').addClass('active');
			$('.method-board img').addClass('active');
			
		}
		
		/**
		**
		=Animate donate
		**
		**/
		/*if($('.donate-basket').length){
			$('.donate-basket').addClass('active');
		}*/

		/**
		**
		=Basket slide
		**
		**/
		var basketMeat = $('#basketMeat').show().bxSlider({
			infiniteLoop: false,
			controls: false,
			pager: false,
			minSlides: 5,
			maxSlides: 5,
			slideWidth: 230,
			slideMargin: 20
		});

		var basketVegetable = $('#basketVegetable').show().bxSlider({
			infiniteLoop: false,
			controls: false,
			pager: false,
			minSlides: 5,
			maxSlides: 5,
			slideWidth: 230,
			slideMargin: 20
		});

		var basketRice = $('#basketRice').show().bxSlider({
			infiniteLoop: false,
			controls: false,
			pager: false,
			minSlides: 5,
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
		=Playing sound
		**
		**/

      

		var playMusic = new Audio('sound/play-music.mp3');
		playMusic.volume = 0;
		playMusic.play();

		var maxIncreaseSound = 0;
		var increaseSound = setInterval(function(){
			if(maxIncreaseSound > 9){
				clearInterval(increaseSound);
			}else{
				playMusic.volume += 0.1;
				maxIncreaseSound += 1;
			}

		}, 1000);


		/*if($('#finishName').length){
			setTimeout(function(){
				playMusic.play();
				
			},3000);
		}else{
			playMusic.play();
		}*/

		var ping = new Audio("sound/Ping-Sound.mp3");//เลือกอาหาร

		$('.layout-basket label').on('click', function(e){
			e.preventDefault();

			ping.play();	
		});

		/**
		**
		=Select Basket
		**
		**/
		$('.layout-basket-slide-meat').css({transform: 'translateX(0)'});

		$('#back').hide();
		
		/* basket 1 */
		$('#basketMeat img').on('click', function(event){
			
			event.preventDefault();

			$('#back').fadeIn();

			var targetDish = $('#dish1');
			var itemMaterial = $(this).data('material');

			$(this).next().prop('checked',true);

			targetDish.addClass('active').html('<img class="material" src="web-images/meat-dish/'+itemMaterial+'.png">');

			$('.layout-basket-slide-meat').css({transform: 'translateY(200%)'});

			$('.layout-basket-slide-vegetable').css({transform: 'translateX(-5%)'});
			
			setTimeout(function(){
				$('.layout-basket-slide-vegetable').css({transform: 'translateX(0)'});
			},400);

			$('#back').off('click');
			$('#back').on('click', function(e){
				e.preventDefault();

				$('#back').fadeOut();
				
				$('.layout-basket-slide-meat').css({transform: 'translateY(0)'});
				$('.layout-basket-slide-vegetable').css({transform: 'translateX(150%)'});
				$('#dish1').removeClass('active').html('');
				$('#basketMeat').find('input').prop('checked',false);
			});
			
			
		});

		/* basket 2 */
		$('#basketVegetable img').on('click', function(event){
			
			event.preventDefault();

			var targetDish = $('#dish2');
			var itemMaterial = $(this).data('material');

			$(this).next().prop('checked',true);

			targetDish.addClass('active').html('<img class="material" src="web-images/vegetable-dish/'+itemMaterial+'.png">');

			$('.layout-basket-slide-vegetable').css({transform: 'translateY(200%)'});
			$('.layout-basket-slide-rice').css({transform: 'translateX(-5%)'});
			setTimeout(function(){
				$('.layout-basket-slide-rice').css({transform: 'translateX(0)'});
			},400);


			$('#back').off('click');
			$('#back').on('click', function(e){
				e.preventDefault();
				
				$('.layout-basket-slide-vegetable').css({transform: 'translateY(0)'});
				$('.layout-basket-slide-rice').css({transform: 'translateX(150%)'});
				$('#dish2').removeClass('active').html('');
				$('#basketVegetable').find('input').prop('checked',false);

				$('#back').off('click');
				$('#back').on('click', function(e){
					e.preventDefault();
					$('#back').fadeOut();
					$('.layout-basket-slide-meat').css({transform: 'translateY(0)'});
					$('.layout-basket-slide-vegetable').css({transform: 'translateX(150%)'});
					$('#dish1').removeClass('active').html('');
					$('#basketMeat').find('input').prop('checked',false);
				});
			});
		});

		/* basket 3 */
		$('#basketRice img').on('click', function(event){
			
			event.preventDefault();

			var targetDish = $('#dish3');
			var itemMaterial = $(this).data('material');

			$(this).next().prop('checked',true);

			targetDish.addClass('active').html('<img class="material" src="web-images/rice-dish/'+itemMaterial+'.png">');
			

			$('.layout-basket-slide-rice').css({transform: 'translateY(200%)'});
			$('.layout-basket-slide-egg').css({transform: 'translateX(-5%)'});
			setTimeout(function(){
				$('.layout-basket-slide-egg').css({transform: 'translateX(0)'});
			},400);

			$('#back').off('click');
			$('#back').on('click', function(e){
				e.preventDefault();
				
				$('.layout-basket-slide-rice').css({transform: 'translateY(0)'});
				$('.layout-basket-slide-egg').css({transform: 'translateX(150%)'});
				$('#dish3').removeClass('active').html('');
				$('#basketRice').find('input').prop('checked',false);

				$('#back').off('click');
				$('#back').on('click', function(e){
					e.preventDefault();
					
					$('.layout-basket-slide-vegetable').css({transform: 'translateY(0)'});
					$('.layout-basket-slide-rice').css({transform: 'translateX(150%)'});
					$('#dish2').removeClass('active').html('');
					$('#basketVegetable').find('input').prop('checked',false);

					$('#back').off('click');
					$('#back').on('click', function(e){
						e.preventDefault();
						$('#back').fadeOut();
						$('.layout-basket-slide-meat').css({transform: 'translateY(0)'});
						$('.layout-basket-slide-vegetable').css({transform: 'translateX(150%)'});
						$('#dish1').removeClass('active').html('');
						$('#basketMeat').find('input').prop('checked',false);
					});
				});
			});
		});

		/* basket 4 */
		$('#basketEgg img').on('click', function(event){
			
			event.preventDefault();

			var targetDish = $('#dish4');
			var itemMaterial = $(this).data('material');

			$(this).next().prop('checked',true);

			targetDish.addClass('active').html('<img class="material" src="web-images/egg/'+itemMaterial+'.png">');

			$('.layout-basket-slide-egg').css({transform: 'translateY(200%)'});
			$('.layout-basket-slide-execute').css({transform: 'translateX(-5%)'});
			setTimeout(function(){
				$('.layout-basket-slide-execute').css({transform: 'translateX(0)'});
			},400);
			
			$('#back').off('click');
			$('#back').on('click', function(e){
				e.preventDefault();
				
				$('.layout-basket-slide-egg').css({transform: 'translateY(0)'});
				$('.layout-basket-slide-execute').css({transform: 'translateX(150%)'});
				$('#dish4').removeClass('active').html('');
				$('#basketEgg').find('input').prop('checked',false);

				$('#back').off('click');
				$('#back').on('click', function(e){
					e.preventDefault();
					
					$('.layout-basket-slide-rice').css({transform: 'translateY(0)'});
					$('.layout-basket-slide-egg').css({transform: 'translateX(150%)'});
					$('#dish3').removeClass('active').html('');
					$('#basketRice').find('input').prop('checked',false);

					$('#back').off('click');
					$('#back').on('click', function(e){
						e.preventDefault();
						
						$('.layout-basket-slide-vegetable').css({transform: 'translateY(0)'});
						$('.layout-basket-slide-rice').css({transform: 'translateX(150%)'});
						$('#dish2').removeClass('active').html('');
						$('#basketVegetable').find('input').prop('checked',false);

						$('#back').off('click');
						$('#back').on('click', function(e){
							e.preventDefault();
							
							$('.layout-basket-slide-meat').css({transform: 'translateY(0)'});
							$('.layout-basket-slide-vegetable').css({transform: 'translateX(150%)'});
							$('#dish1').removeClass('active').html('');
							$('#basketMeat').find('input').prop('checked',false);
						});
					});
				});
			});
		});

		/**
		**
		=Playing submit
		**
		**/
		var snd = new Audio("sound/cooking.mp3"); // buffers automatically when created
		

		$('#playingSubmit').on('click', function(e){
			e.preventDefault();
			
			snd.play();

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

		/**
		**
		=Benefit
		**
		**/
		$('.basket-outside').on('mouseenter', function(e){
			e.preventDefault();

			$(this).find('.meat-name').animate({
				opacity: 1
			});
		});

		$('.basket-outside').on('mouseleave', function(e){
			e.preventDefault();

			$(this).find('.meat-name').animate({
				opacity: 0
			});
		});

		$('.meat-name').on('click', function(e){
			e.preventDefault();

			var contentTarget = $(this).attr('href');
			$(contentTarget).show();
		});

		$('.button-close').on('click', function(e){
			e.preventDefault();

			$('.benefit-wrapper').hide();
		});

		

		

	});
	
});

</script>
