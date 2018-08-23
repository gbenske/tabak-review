var gulp = require('gulp');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var tinypng = require('gulp-tinypng');
var concat = require('gulp-concat');


gulp.task('concat', function() {
   gulp.src('assets/js/*.js')
	    .pipe(concat('all.js'))
	    .pipe(gulp.dest('assets/js'));
	 gulp.src('assets/sass/default.sass')
	 	.pipe(sass())
	    .pipe(concat('default.css'))
	    .pipe(gulp.dest('assets/css'));
});

// Scripts Task
// Uglifies
gulp.task('scripts', function(){
	gulp.src('assets/js/*.js')
		.pipe(uglify())
		.pipe(gulp.dest('assets/js/minjs'));
});


// Scripts Task
// SASS to CSS
gulp.task('styles', function(){
	gulp.src('assets/sass/**/*.sass')
		.pipe(sass({
			outputStyle: 'compressed'
		}).on('error', sass.logError))
		.pipe(gulp.dest('assets/css'))
		.pipe(browserSync.stream());
});


// tinypng Task
// Compress IMG
gulp.task('tinypng', function(){
	gulp.src('assets/img/*')
		.pipe(tinypng('FrpWInYcZzX4oFUj_wE64kJy3ecna4vb'))
		.pipe(gulp.dest('assets/img/compressed_images'));
});


// watch Task
// 
gulp.task('watch', function(){
	browserSync.init({
		proxy: 'http://192.168.178.41'
	});
	gulp.watch('assets/js/*.js', ['concat']);
	gulp.watch('assets/js/all.js', ['scripts']);
	gulp.watch('assets/sass/**/*.sass', ['styles']);
	//gulp.watch('page/*.php').on('change', reload);
	//gulp.watch('assets/img/compressed_images', ['tinypng']);
});


// default Task
// 
gulp.task('default', ['styles', 'watch']);