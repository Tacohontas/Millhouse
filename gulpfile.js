var gulp = require("gulp");
var autoprefix = require("gulp-autoprefixer");
var plumber = require("gulp-plumber");
var sass = require("gulp-sass");
const concat = require("gulp-concat");
let cleanCSS = require("gulp-clean-css");
sass.compiler = require("node-sass");

const SCSS_PATH = "styles/sass/*.scss";

//styles

gulp.task("styles", async function() {
  console.log("styles is running");
  //return gulp.src(["public/scss/reset/reset.scss", CSS_PATH])
  return (
    gulp
      .src(SCSS_PATH)
      .pipe(
        plumber(function(err) {
          console.log("Styles error", err);
        })
      )
      // .pipe(sourcemaps.init())
      .pipe(sass().on("error", sass.logError))
      .pipe(concat("style.css")) // kommer ta dina css-filer och baka ihop till en cssfil med namnet "styles.css"
      .pipe(cleanCSS({ compatibility: "ie8" })) // lägger all CSS på samma rad.
      //  .pipe(sourcemaps.write("./maps"))
      .pipe(autoprefix()) // gör din kod kompatibel med andra browsers.

      .pipe(gulp.dest("styles/"))
  ); // Här väljer man destinationen för style.css-filen
});

//gulp watch

gulp.task("watch", async function() {
  gulp.watch(CSS_PATH, gulp.series("styles"));
});
