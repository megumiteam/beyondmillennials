var gulp         = require( 'gulp' );
var sass         = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var plumber      = require( 'gulp-plumber' );
var gutil        = require( 'gulp-util' );
var jshint       = require( 'gulp-jshint' );
var through2     = require( 'through2' );

var onError = function (err) {
  console.log( 'An error occurred:', gutil.colors.magenta(err.message) );
  gutil.beep();
  this.emit( 'end' );
};

gulp.task( 'sass', function() {
  return gulp.src( './sass/*.scss' )
  .pipe( plumber( { errorHandler: onError } ) )
  .pipe( sourcemaps.init() )
  .pipe( sass( { outputStyle: 'expanded' } ).on( 'error', sass.logError ) )
  .pipe( autoprefixer({
    overrideBrowserslist: [
    'last 2 versions',
    'Android >= 6.0'
    ],
    grid: true,
  }))
  .pipe( sourcemaps.write('./') )
  .pipe( through2.obj( function( file, enc, cb ) {
      let date = new Date();
      file.stat.atime = date;
      file.stat.mtime = date;
      cb( null, file );
  }) )
  .pipe( gulp.dest('./') );
});

gulp.task( 'jslint', function() {
  return gulp.src( './js/*.js' )
  .pipe( jshint() )
  .pipe( jshint.reporter( 'default' ) );
});

gulp.task( 'watch', function() {
  gulp.watch( './sass/**/*.scss', gulp.series('sass') );
  gulp.watch( './js/*.js', gulp.series('jslint') );
});

gulp.task( 'default', gulp.series( 'watch' ) );
