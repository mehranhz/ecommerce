
<footer style="width: 100%;min-height: 200px;background-color: rgba(5,5,5,0.91)
">

</footer>
<script>
    var lastScrollTop = 0;

    // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
    window.addEventListener("scroll", function(){ // or window.addEventListener("scroll"....
        var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
        if (st > lastScrollTop){
            console.log('scrolling down')
            document.getElementById('d-nav').classList.remove('moved-down');
            document.getElementById('d-nav').classList.add('moved-up');
        } else {
            document.getElementById('d-nav').classList.remove('moved-up');
            document.getElementById('d-nav').classList.add('moved-down');
        }
        lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
    }, false);
</script>
<script src="{{asset('js/app.js')}}"></script>
@include('sweet::alert')
</body>
</html>
