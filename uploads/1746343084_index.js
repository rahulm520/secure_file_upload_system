// backend/index.js
require('dotenv').config()
const { createAgent } = require('@veramo/core')
const { KeyManager } = require('@veramo/key-manager')
const { DIDManager } = require('@veramo/did-manager')
const { CredentialIssuer } = require('@veramo/credential-w3c')
const { EthrDIDProvider } = require('@veramo/did-provider-ethr')
const { DIDResolverPlugin } = require('@veramo/did-resolver')
const { getResolver } = require('ethr-did-resolver')
const { KeyManagementSystem, MemoryPrivateKeyStore } = require('@veramo/kms-local')
const { MemoryKeyStore } = require('@veramo/kms-local')

const keyStore = new MemoryKeyStore()
const privateKeyStore = new MemoryPrivateKeyStore()
const kms = new KeyManagementSystem(privateKeyStore)

const agent = createAgent({
  plugins: [
    new KeyManager({ store: keyStore, kms: { local: kms } }),
    new DIDManager({
      store: keyStore,
      defaultProvider: 'did:ethr:sepolia',
    providers: {
    'did:ethr:sepolia': new EthrDIDProvider({
        ...
        network: 'sepolia',
        rpcUrl: process.env.SEPOLIA_RPC_URL,
    }),
    }

    }),
    new CredentialIssuer(),
    new DIDResolverPlugin({ resolver: getResolver({ infuraProjectId: process.env.INFURA_ID }) }),
  ],
})

module.exports = { agent }
