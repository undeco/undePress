var gulp        		= require('gulp');
var browserSync 		= require('browser-sync').create();
var sass        		= require('gulp-sass');
var uglify      		= require('gulp-uglify');
var imagemin 			= require('gulp-imagemin');
var pngquant 			= require('imagemin-pngquant');
var autoprefixer 		= require('gulp-autoprefixer');
var autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};

gulp.task('serve', ['sass', 'js'], function() {

    browserSync.init({
         proxy: "http://localhost:8888/036-rpc"
    });

    gulp.watch("./src/scss/**/*.scss", ['sass']);
    gulp.watch("./**/*.php").on('change', browserSync.reload);
    gulp.watch("./src/js/*.js", ['js']);
});

gulp.task('sass', function() {
    return gulp.src("./src/scss/main.scss")
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(gulp.dest("./dist/css/main.css"))
        .pipe(browserSync.stream());
});

gulp.task('js', function () {
    return gulp.src('./src/js/*js')
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js'))
        .pipe(browserSync.reload);
});

gulp.task('default', ['serve']);

gulp.task('imagemin', function () {
	return gulp.src('./src/images/*')
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		}))
		.pipe(gulp.dest('./dist/images'));
});
