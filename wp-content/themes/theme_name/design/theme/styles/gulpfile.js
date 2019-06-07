// install packages from cli:
// $ npm install gulp-cli gulp-concat gulp-cssnano gulp-autoprefixer gulp-rename

const gulp          = require('gulp');
const concat        = require('gulp-concat');
const autoprefixer  = require('gulp-autoprefixer');
const cssnano       = require('gulp-cssnano');
const rename        = require("gulp-rename");


gulp.task('c', function () {
    return gulp.src(
        [
            './source/*.css',
        ]
    )
    .pipe(concat('build.css'))
    .pipe( autoprefixer({
        browsers: ['last 2 versions'],
        cascade: true
    }) )
    .pipe( cssnano() )
    .pipe( rename({
        suffix: ".min",
    }))
    .pipe(gulp.dest('./'));
});
