export const cacheId = 'hr-app-' + Math.floor(Date.now() / 1000);
export const globDirectory = "public/";
export const globPatterns = [
    "**/*.{css,ico,eot,svg,ttf,woff,woff2,js,json}",
    "images/*.{png,jpg,jpeg,gif,bmp}",
];
export const swDest = "public\\sw.js";
export const runtimeCaching = [{
    urlPattern: "/",
    handler: 'networkFirst',
}, ];
