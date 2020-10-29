class Http {
    // Make Get Request from API
    async get(url) {
        const response = await fetch(url);
        const resData = await response.json();
        return resData;
    }
}
