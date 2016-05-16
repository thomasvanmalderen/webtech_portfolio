var gulp = require("gulp");
var cleanCSS = require('gulp-clean-css');
var concatCSS = require('gulp-concat-css');

gulp.task('default', function(){
    console.log("yo");
});

gulp.task('minify-css', function() {
  return gulp.src('assets/css/*.css')
    .pipe(concatCSS("css/bundle.css"))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('build'));
});

gulp.task('watch', function(){ 
    // allows us to run 'gulp watch' 
    // watch CSS files changes and run the ‘styles’ task on change 
    gulp.watch('./assets/css/*.css', ['minify-css']);
})