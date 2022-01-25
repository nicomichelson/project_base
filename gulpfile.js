const { src, dest, watch } = require('gulp'); 
const sass = require('gulp-sass')(require('sass'));

function tarea(done){
    console.log('DEesde gulp');
    done();
}

function css(done){
    
    src('src/scss/**/*.scss') //identificar el archivo .SCSS a compilar
        .pipe(sass())//compilarlo
        .pipe(dest('public/build/css'))//almacenar    
    done();
}

function dev(done){
    watch('src/scss/**/*.scss', css);
    done();
}

exports.tarea = tarea;
exports.css = css;
exports.dev = dev;