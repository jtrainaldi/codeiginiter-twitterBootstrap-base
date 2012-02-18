$(document).ready(function(){
  
  /**
   * APPLICATION 
   * Author: James Rainaldi
   * 
   *
   */


  //$('.tabs').tabs()
  $('[rel="tooltip"]').tooltip({});
  $('[rel="popover"]').popover({});
  $('.carousel').carousel({});



  //Force new window on links
  $('[rel="external"]').click(function(e){
    e.preventDefault();
    window.open($(this).attr('href'));
  });



  /* Additional customization for twitter bootstrap form controls 
  // add on logic
  */
  $('.add-on :checkbox').click(function () {
    if ($(this).attr('checked')) {
      $(this).parents('.add-on').addClass('active')
    } else {
      $(this).parents('.add-on').removeClass('active')
    }
  })


  // Copy code blocks in docs
  $(".copy-code").focus(function () {
    var el = this;
    // push select to event loop for chrome :{o
    setTimeout(function () { $(el).select(); }, 0);
  });


  // POSITION STATIC TWIPSIES
  // ========================

  $(window).bind( 'load resize', function () {
    $(".twipsies a").each(function () {
       $(this)
        .twipsy({
          live: false
        , placement: $(this).attr('title')
        , trigger: 'manual'
        , offset: 2
        })
        .twipsy('show')
      })
  })






/* FORM VALIDATION FUNCTIONS */

  //Form validation main function
  $('form').validate({
    invalidHandler: function(form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message = errors == 1
          ? 'You missed 1 field. It has been highlighted'
          : 'You missed ' + errors + ' fields. They have been highlighted';
        $("div.error span").html(message);
        $("div.error").show();
      } else {
        $("div.error").hide();
      }
    },
    submitHandler: function(form) {

    }
  });


/* END OF - FORM VALIDATION FUNCTIONS */


/* ************************************************* 
// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
************************************************* */
window.log=function(){log.history=log.history||[];log.history.push(arguments);if(this.console){console.log(Array.prototype.slice.call(arguments))}};

// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,timeStamp,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());


/* ************************************************* 
// place any jQuery/helper plugins in here, instead of separate, slower script files.
************************************************* */

/* PLUGIN DIRECTORY
What you can find in this file [listed in order they appear]

       1.) jQuery Tipsy Plugin - https://github.com/jaz303/tipsy
       2.) ...
       3.) ...          
       4.) ...
       5.) ...
*/

/**
* 1.) jQuery Tipsy Plugin - https://github.com/jaz303/tipsy
* @author Jason Frame
* version 1.0.0a
* Downloaded from Github on Oct. 22, 2011
*/


});

