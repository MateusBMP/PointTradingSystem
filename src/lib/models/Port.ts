import { Country } from "./Country";

/** Objeto modelo Porto */
export class Port {
    private _name: string;
    private _country: Country;

    /**
     * Constrói o objeto Porto com um nome e País pertencente
     * @param name Nome do porto
     * @param country País do porto
     */
    constructor(name: string, country: Country) {
        this._name = name;
        this._country = country;
    }

    get Name() {
        return this._name;
    }

    get Country() {
        return this._country;
    }
}