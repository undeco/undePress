var gulp            = require('gulp');
var browserSync     = require('browser-sync');
var reload          = browserSync.reload;
var sass            = require('gulp-sass');
var autoprefixer    = require('gulp-autoprefixer');
var uglify          = require('gulp-uglify');
 
// Inicia o servidor
gulp.task('browser-sync', function() {
    // Watch nos arquivos
    var files = [
    './src/scss/**/*.scss',
    './src/js/**/*.js',
    './*.php'
    ];
 
    //Inicia o browserSync
    browserSync.init(files, {
    // O proxy eh usado pq a gente ja tem um servidor
    proxy: "localhost:8888/SITE_AQUI/",
    notify: false
    });
});
 
// Task pro SASS, vai rodar qualquer alteracao no SCSS e sincronizar com o browserSync
// atualizando automaticamente os browsers

gulp.task('sass', function () {
    return gulp.src('./src/scss/**/*.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer(['last 2 versions', '> 5%', 'Firefox ESR']))
        .pipe(gulp.dest('./dist/css/'))
        .pipe(browserSync.stream());
});

//Task JS

gulp.task('compress', function() {
  return gulp.src('./src/js/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('./dist/js'));
});

 
// Default task to be run with `gulp`
gulp.task('default', ['sass', 'compress', 'browser-sync'], function () {
    gulp.watch("./src/scss/**/*.scss", ['sass']);
    gulp.watch("./src/js/**/*.js", ['compress']);
});
