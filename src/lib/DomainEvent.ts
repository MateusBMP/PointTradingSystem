/** Evento genérico que pode ser processado via EventProcessor */
export abstract class DomainEvent {
    _occurred: Date;
    _recorded: Date;

    /**
     * Constrói o objeto passando a data de ocorrência do evento.
     * @param {Date} ocurred 
     */
    constructor(occurred: Date) {
        this._occurred = occurred;
        this._recorded = new Date();
    }

    /**
     * Processa o evento criado.
     */
    abstract process(): void;
}