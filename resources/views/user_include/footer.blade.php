<!-- <section class="deals" id='dealsId'>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
					<h3 class="text-center"> Deals </h3>
						<div class="col-md-3 col-sm-4 col-xs-12">
		       			 <img src="{{ asset('asset/img/gallery_1.jpg') }}" alt="" class="img-responsive">
		      		</div>
		      		<div class="col-md-3 col-sm-4 col-xs-12">
		       			 <img src="{{ asset('asset/img/gallery_1.jpg') }}" alt="" class="img-responsive">
		      		</div>
		      		<div class="col-md-3 col-sm-4 col-xs-12">
		       			 <img src="{{ asset('asset/img/gallery_1.jpg') }}" alt="" class="img-responsive">
		      		</div>
		      		<div class="col-md-3 col-sm-4 col-xs-12">
		       			 <img src="{{ asset('asset/img/gallery_1.jpg') }}" alt="" class="img-responsive">
		      		</div>
		        </div>
				</div>
			</div>
		</div>
</section> -->

<footer>
  <div class="container">
    <div class="col-md-2 col-xs-12">
        <ul class="footerlist">
          <li><a href="{{url('/')}}">Home</a></li>
            <li> <a href="#">Support</a></li>
             <!--  <li><a href="#">Team</a></li>
                <li><a href="#">Carees</a></li> -->
                  <li><a href="{{url('/aboutus')}}">About Us</a></li>
                  <!--  <li><a href="{{url('/Product')}}">Product and Service</a></li> -->
                   <li><a href="{{url('/Contact')}}">Contact Us</a></li>
                    <li><a href="#">Affiliation Program </a></li>
        </ul>
      </div>
    <div class="col-md-2 col-xs-12">
        <ul class="footerlist">
          <li><a href="{{url('/privacy')}}">Privacy policy</a></li>

          <li><a href="{{url('/Refund')}}">Refund Policy</a></li>
          <li><a href="{{url('/Cancel')}}">Cancel and Return Policy</a></li>
          
            <li> <a href="{{url('/termcondition')}}">Terms & Conditions</a></li>
           <!--  <li><a href="#">Ecommerce Flow and Incorp</a></li> -->
              <li><a href="#">Vendar policy</a></li>
        </ul>
    </div>
    <div class="col-md-2 col-xs-12">
    <ul class="footerlist">
          <li><a href="#">Partner with Alive</a></li>
            <li> <a href="#">Business with us</a></li>
              <li><a href="#">Facilities</a></li>
        </ul>
    </div>
    <div class="col-md-2 col-xs-12">
<ul class="footerlist">
          <li><a href="#">Gyms</a></li>
            <li> <a href="#">Fitness center</a></li>
              <li><a href="{{url('/gymListYoga')}}">Yoga center</a></li>
                <li><a href="{{url('/gymListAerobics')}}">Aerobics</a></li>
                  <li><a href="#">Mental welness</a></li>
        </ul>
    </div>
    <div class="col-md-4 col-xs-12 text-right">
    <img width="100" height="40" src="{{ asset('asset/img/logo.png') }}" class="bg_white">
      <p class="slung white">Fitness & more</p>
    <ul class="social-network text-center">
    <li><a target="_blank" href="https://www.facebook.com/Alivefitnez-1322807337813567/"><img src="{{ asset('asset/img/facebook-logo.png') }}" alt="" width="20" height="20"></a></li>
                            <li><a target="_blank" href="https://twitter.com/alivefitnez"><img src="{{ asset('asset/img/twitter-logo.png') }}" alt="" width="20" height="20"></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/alivefitnez/"><img src="{{ asset('asset/img/instagram-logo.png') }}" alt="" width="20" height="20"></a></li>
    
    </ul>

    <p class="white col-sm-12 col-xs-12"> (&copy;) Fitbeanz Fitness Company </p>
    </div>
  </div>
</footer>
</div>

<script type="text/javascript">
	// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
    $('#count').html(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});
</script>
</body>
</html>

