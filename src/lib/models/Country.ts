/** Modelo de Países */
export class Country {
    public name: string;

    /**
     * Constrói o modelo do país.
     * @param name Nome do país
     */
    constructor(name: string) {
        this.name = name;
    }
}